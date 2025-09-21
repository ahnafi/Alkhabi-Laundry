<?php

namespace App\Filament\U\Resources\Orders\Pages;

use App\Filament\U\Resources\Orders\OrderResource;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\CreateRecord;
use Filament\Schemas\Components\Wizard\Step;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class CreateOrder extends CreateRecord
{
//    use CreateRecord\Concerns\HasWizard;

    protected static string $resource = OrderResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['code'] = "LNDRY-" . Carbon::now()->format("ymd") . Str::upper(Str::random(3));
        $data['user_id'] = auth()->id();

        return parent::mutateFormDataBeforeCreate($data);
    }

//    protected function getSteps(): array
//    {
//        return [
//            Step::make("Paket Laundry")
//                ->completedIcon(Heroicon::HandThumbUp)
//                ->schema([
//                    Repeater::make('orderItems')
//                        ->relationship()
//                        ->schema([
//                            Select::make('product_id')
//                                ->relationship('product', 'name')
//                                ->searchable()
//                                ->preload(),
//
//                            Select::make('service_id')
//                                ->relationship('product', 'name')
//                                ->searchable()
//                                ->preload()
//
//
//
////                            'order_id',
////                            'service_id',
////                            'quantity',
////                            'weight',
////                            'price',
////                            'subtotal',
//                        ])
//                ]),
//            Step::make('Alamat')
//                ->completedIcon(Heroicon::HandThumbUp)
//                ->schema([
//                    TextInput::make('user_id')
//                        ->label('ID Pengguna')
//                        ->default(auth()->id())
//                        ->required()
//                        ->hidden()
//                        ->numeric(),
//                    Select::make('pickup_address_id')
//                        ->label('Alamat Penjemputan')
//                        ->relationship('pickupAddress', 'label', function ($query) {
//                            return $query->where('user_id', auth()->id());
//                        })
//                        ->getOptionLabelFromRecordUsing(fn($record) => "{$record->label} - {$record->recipient_name} - {$record->recipient_phone} - {$record->full_address} - {$record->notes}"
//                        )
//                        ->preload()
//                        ->searchable()
//                        ->required(),
//
//                    Select::make('delivery_address_id')
//                        ->label('Alamat Pengiriman')
//                        ->relationship('deliveryAddress', 'label', function ($query) {
//                            return $query->where('user_id', auth()->id());
//                        })
//                        ->getOptionLabelFromRecordUsing(fn($record) => "{$record->label} - {$record->recipient_name} - {$record->recipient_phone} - {$record->full_address} - {$record->notes}"
//                        )
//                        ->searchable()
//                        ->preload()
//                        ->required(),
//                    Select::make('status')
//                        ->label('Status Pesanan')
//                        ->options([
//                            'PENDING' => 'Menunggu',
//                            'CONFIRMED' => 'Dikonfirmasi',
//                            'PICKED_UP' => 'Dijemput',
//                            'IN_PROCESS' => 'Diproses',
//                            'READY' => 'Siap',
//                            'OUT_FOR_DELIVERY' => 'Dalam Pengiriman',
//                            'DELIVERED' => 'Terkirim',
//                            'COMPLETED' => 'Selesai',
//                            'CANCELLED' => 'Dibatalkan',
//                        ])
//                        ->hidden()
//                        ->default('PENDING')
//                        ->required(),
//                    Select::make('payment_status')
//                        ->label('Status Pembayaran')
//                        ->options([
//                            'UNPAID' => 'Belum Dibayar',
//                            'PAID' => 'Sudah Dibayar',
//                            'EXPIRED' => 'Kedaluwarsa',
//                        ])
//                        ->hidden()
//                        ->default('UNPAID')
//                        ->required(),
//                ]),
////            Step::make('Penjemputan')
////                ->schema([
////                    Select::make('status')
////                        ->label('Status Pesanan')
////                        ->options([
////                            'PENDING' => 'Menunggu',
////                            'CONFIRMED' => 'Dikonfirmasi',
////                            'PICKED_UP' => 'Dijemput',
////                            'IN_PROCESS' => 'Diproses',
////                            'READY' => 'Siap',
////                            'OUT_FOR_DELIVERY' => 'Dalam Pengiriman',
////                            'DELIVERED' => 'Terkirim',
////                            'COMPLETED' => 'Selesai',
////                            'CANCELLED' => 'Dibatalkan',
////                        ])
////                        ->default('PENDING')
////                        ->required(),
////                ]),
////                Step::make('Billing')
////                    ->label('Pembayaran')
////                    ->schema([
////                        Select::make('payment_status')
////                            ->label('Status Pembayaran')
////                            ->options([
////                                'UNPAID' => 'Belum Dibayar',
////                                'PAID' => 'Sudah Dibayar',
////                                'EXPIRED' => 'Kedaluwarsa',
////                            ])
////                            ->default('UNPAID')
////                            ->required(),
////                        TextInput::make('total_weight')
////                            ->label('Total Berat (kg)')
////                            ->numeric()
////                            ->default(null),
////                        TextInput::make('subtotal_amount')
////                            ->label('Subtotal')
////                            ->required()
////                            ->numeric()
////                            ->default(0.0),
////                        TextInput::make('delivery_fee')
////                            ->label('Biaya Pengiriman')
////                            ->required()
////                            ->numeric()
////                            ->default(0.0),
////                        TextInput::make('total_amount')
////                            ->label('Total Pembayaran')
////                            ->required()
////                            ->numeric()
////                            ->default(0.0),
////                        Textarea::make('notes')
////                            ->label('Catatan')
////                            ->default(null)
////                            ->columnSpanFull(),
////                        DateTimePicker::make('completed_date')
////                            ->label('Tanggal Selesai'),
////                    ]),
////
////                Step::make("Pencucian/Laundry")
////                    ->schema([
////
////                    ]),
//
//
//        ];
//    }

}
