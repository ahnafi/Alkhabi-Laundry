<?php

namespace App\Services;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Service;
use App\Models\User;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderService
{
    public function confirm(Order $order): void
    {

        $customer = $order->customer;

        $order->status = "CONFIRMED";
        $order->responsible_user_id = auth()->id();


        Notification::make("order_confirmed")
            ->success()
            ->title("Pesanan Laundry Dikonfirmasi")
            ->body("Pesanan laundry Anda dengan kode {$order->code} telah dikonfirmasi. Tim kami akan segera  menjadwalan penjemputan. Terima kasih telah mempercayai layanan kami!")
            ->sendToDatabase($customer)
            ->icon(Heroicon::OutlinedCheckBadge);

        Log::info("confirm order database message to $customer->name");

        $order->save();
    }

    public function cancel(Order $order, string $reason): void
    {

        $customer = $order->customer;

        $order->status = "CANCELLED";
        $order->responsible_user_id = auth()->id();

        Notification::make("order_cancelled")
            ->danger()
            ->title("Pesanan Laundry Dibatalkan")
            ->body("Pesanan laundry Anda dengan kode {$order->code} telah dibatalkan. Alasan: {$reason}. Jika Anda memiliki pertanyaan, silakan hubungi customer service kami. Terima kasih atas pengertiannya.")
            ->sendToDatabase($customer)
            ->icon(Heroicon::OutlinedXCircle);

        Log::info("canceled order database message to $customer->name");

        $order->save();
    }

    public function pickedUp(Order $order): void
    {
        $customer = $order->customer;

        $order->status = "PICKED_UP";

        Notification::make("order_picked_up")
            ->info()
            ->title("Laundry Telah Dijemput")
            ->body("Laundry Anda dengan kode {$order->code} telah berhasil dijemput oleh tim kami. Selanjutnya pakaian Anda akan ditimbang dan kami akan menentukan paket layanan yang sesuai. Setelah itu, Anda akan diminta untuk melakukan pembayaran sebelum proses pencucian dimulai.")
            ->sendToDatabase($customer)
            ->icon(Heroicon::OutlinedTruck);

        Log::info("pickup order database message to $customer->name");

        $order->save();
    }

    public function setOrderItem(Order $order, array $data): void
    {
        $customer = $order->customer;

        try {
            DB::beginTransaction();

            $subtotal = 0;

            foreach ($data["order_items"] as $item) {
                $service = Service::find($item["service_id"]);

                $orderItemSubtotal = $item["qty"] * $service->price_per_unit;

                $order->orderItems()->create([
                    'service_id' => $service->id,
                    'qty' => $item["qty"],
                    'subtotal' => $orderItemSubtotal,
                ]);

                $subtotal += $orderItemSubtotal;
            }

            $order->delivery_fee = $data["delivery_fee"];
            $order->subtotal_amount = $subtotal;
            $order->total_amount = $subtotal + $data["delivery_fee"];

            $order->save();

            DB::commit();

            Log::info("setting order item to $order->code", [
                "subtotal" => $subtotal,
                "delivery_fee" => $data["delivery_fee"],
                "total" => $subtotal + $data["delivery_fee"],
            ]);

            // Notifikasi sukses ke pelanggan
            Notification::make("order_items_set_success")
                ->success()
                ->title("Paket Laundry Telah Ditentukan")
                ->body("Pakaian Anda dengan kode {$order->code} telah ditimbang dan paket layanan telah ditentukan. Total pembayaran: Rp " . number_format($order->total_amount, 0, ',', '.') . ". Silakan lakukan pembayaran untuk memulai proses pencucian.")
                ->sendToDatabase($customer)
                ->icon(Heroicon::OutlinedScale);

        } catch (\Exception $e) {
            DB::rollBack();

            Log::error("Failed to set order items for order {$order->id}: " . $e->getMessage());

            Notification::make("order_items_set_failed")
                ->danger()
                ->title("Gagal Menentukan Paket Laundry")
                ->body("{$order->code}")
                ->send()
                ->icon(Heroicon::OutlinedExclamationTriangle);
        }
    }

    public function processing(Order $order): void
    {
        $customer = $order->customer;

        if ($order->payment_status == "PAID") {

            $order->status = "IN_PROCESS";

            Notification::make("order_processing")
                ->info()
                ->title("Laundry Sedang Diproses")
                ->body("Pakaian Anda dengan kode {$order->code} sedang diproses dan dicuci dengan standar kualitas terbaik. Tim kami akan memberitahu Anda ketika laundry sudah selesai dan siap diantar. Terima kasih atas kesabaran Anda!")
                ->sendToDatabase($customer)
                ->icon(Heroicon::OutlinedCog);

            Log::info("processing order database message to $customer->name");

            $order->save();

        } else {

            Notification::make("order_processing_failed")
                ->warning()
                ->title("Gagal Memulai Layanan")
                ->body("Gagal memulai proses laundry dikarenakan customer $customer->name belum melakukan pembayaran.")
                ->send();

            Log::error("processing order failed $order->code");

        }

    }

    public function processingDone(Order $order): void
    {
        $customer = $order->customer;
        if ($order->status == "IN_PROCESS" && $order->payment_status == "PAID") {

            $order->status = "READY";
            $order->save();

            Notification::make("order_ready")
                ->success()
                ->title("Laundry Selesai dan Siap Diantar")
                ->body("Kabar baik! Laundry Anda dengan kode {$order->code} telah selesai dicuci dan sudah siap untuk diantar. Tim kami akan segera mengatur jadwal pengiriman ke alamat Anda. Terima kasih telah menggunakan layanan kami!")
                ->sendToDatabase($customer)
                ->icon(Heroicon::OutlinedCheckCircle);

            Log::info("order ready database message to $customer->name for order $order->code");

        } else {
            Notification::make("order_ready_failed")
                ->warning()
                ->title("Gagal menyelesaikan laundry")
                ->body("Gagal menyelesaikan proses laundry dikarenakan customer $customer->name belum melakukan pembayaran atau laundry belum diproses")
                ->send();

            Log::error("order ready database failed $order->code");
        }
    }

    public function outOfDelivery(Order $order): void
    {
        $customer = $order->customer;

        if ($order->payment_status == "PAID" && $order->status == "READY") {

            $order->status = "OUT_FOR_DELIVERY";
            $order->save();

            Notification::make("order_out_of_delivery")
                ->info()
                ->title("Laundry Sedang Dalam Pengiriman")
                ->body("Laundry Anda dengan kode {$order->code} sedang dalam perjalanan menuju alamat Anda. Kurir kami akan segera tiba untuk mengantarkan pakaian yang sudah bersih dan wangi. Mohon pastikan ada yang menerima di lokasi pengiriman. Terima kasih!")
                ->sendToDatabase($customer)
                ->icon(Heroicon::OutlinedTruck);

            Log::info("order out for delivery message to $customer->name for order $order->code");

        } else {

            Notification::make("order_out_of_delivery_failed")
                ->warning()
                ->title("Gagal Memulai Pengiriman")
                ->body("Gagal memulai pengiriman laundry dengan kode {$order->code} dikarenakan pesanan belum siap untuk dikirim atau pembayaran belum selesai.")
                ->send()
                ->icon(Heroicon::OutlinedExclamationTriangle);

            Log::error("order out for delivery failed for $order->code - status: {$order->status}, payment: {$order->payment_status}");

        }

    }

    public function delivered(Order $order): void
    {
        $customer = $order->customer;

        if ($order->payment_status == "PAID" && $order->status == "OUT_FOR_DELIVERY") {
            $order->status = "DELIVERED";
            $order->save();

            Notification::make("order_delivered")
                ->success()
                ->title("Konfirmasi Pesanan")
                ->body("Laundry Anda dengan kode {$order->code} telah berhasil dikirim. Mohon konfirmasi jika pesanan sudah diterima dan selesai.")
                ->actions([
                    Action::make("order_completed")
                        ->label("Konfirmasi Laundry")
                        ->url(route("filament.u.resources.orders.index")),
                ])
                ->icon(Heroicon::OutlinedCheckCircle)
                ->sendToDatabase($customer);

            Log::info("order delivered message to $customer->name for order $order->code");

        } else {

            Notification::make("order_delivered_failed")
                ->warning()
                ->title("Gagal Mengirim Laundry")
                ->body("Gagal mengirim laundry dengan kode {$order->code} dikarenakan pesanan belum siap untuk dikirim atau pembayaran belum selesai.")
                ->send()
                ->icon(Heroicon::OutlinedExclamationTriangle);

            Log::error("order delivered failed for $order->code - status: {$order->status}, payment: {$order->payment_status}");

        }
    }

    // user service

    public function userConfirmed(Order $order): void
    {
        $order->status = "COMPLETED";

        Notification::make("order_completed")
            ->title("Berhasil Konfirmasi Pesanan ")
            ->success()
            ->send();

        Notification::make("feedback")
            ->success()
            ->title("Laundry $order->code telah selesai")
            ->body("Terima kasih telah menggunakan layanan laundry kami! Kami sangat menghargai kepercayaan Anda. Bagikan pengalaman Anda dengan memberikan ulasan atau sampaikan keluhan melalui kontak customer service yang tersedia.")
            ->actions([
                Action::make("feedback")
                    ->url(route('filament.u.resources.orders.index'))
                    ->label("Ulasan")
                    ->color("success")
            ])
            ->sendToDatabase($order->customer);

        $adminUsers = User::withoutRole('user')->get();

        foreach ($adminUsers as $adminUser) {

            Notification::make("order_cancelled_user")
                ->success()
                ->title("Laundry Dikonfirmasi")
                ->body("Laundry dengan kode $order->code telah dikonfirmasi oleh {$order->customer->name}")
                ->sendToDatabase($adminUser)
                ->icon(Heroicon::OutlinedXCircle);
        }

        Log::info("order confirmed message to $order->code");

        $order->save();
    }

    public function userCancel(Order $order, string $reason): void
    {
        if ($order->status == "CONFIRMED" || $order->status == "PENDING" || $order->status == "PICKED_UP") {

            $adminUsers = User::withoutRole('user')->get();

            $order->status = "CANCELLED";

            foreach ($adminUsers as $adminUser) {

                Notification::make("order_cancelled_user")
                    ->danger()
                    ->title("Pesanan Laundry Dibatalkan oleh Pelanggan")
                    ->body("Pelanggan {$order->customer->name} telah membatalkan pesanan laundry dengan kode {$order->code}. Alasan pembatalan: {$reason}. Silakan tindak lanjuti jika diperlukan.")
                    ->sendToDatabase($adminUser)
                    ->icon(Heroicon::OutlinedXCircle);
            }

            Log::info("");

            $order->save();

        } else {
            Notification::make("order_cancel_failed")
                ->danger()
                ->title('Tidak Dapat Membatalkan Pesanan')
                ->body("Maaf, pesanan laundry dengan kode {$order->code} tidak dapat dibatalkan karena sudah memasuki tahap pemrosesan. Laundry Anda sedang dalam proses pencucian atau sudah selesai dikerjakan. Untuk bantuan lebih lanjut, silakan hubungi customer service kami.")
                ->icon(Heroicon::OutlinedExclamationTriangle)
                ->send();

            Log::info("Canceled order $order->code by {$order->customer->name}");
        }
    }

}
