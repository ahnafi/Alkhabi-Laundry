<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_code')->unique();
            $table->foreignId('user_id')->constrained('users', 'user_id')->cascadeOnDelete();
            $table->foreignId('responsible_user_id')->constrained('users', 'user_id')->cascadeOnDelete();
            $table->foreignId('pickup_address_id')->constrained('addresses', 'address_id')->cascadeOnDelete();
            $table->foreignId('delivery_address_id')->constrained('addresses', 'address_id')->cascadeOnDelete();
            $table->enum('status', [
                'PENDING',
                'CONFIRMED',
                'PICKED_UP',
                'IN_PROCESS',
                'READY',
                'OUT_FOR_DELIVERY',
                'DELIVERED',
                'COMPLETED',
                'CANCELLED'
            ])->default('PENDING');

            //PENDING - Order baru dibuat, menunggu konfirmasi
            //CONFIRMED - Order dikonfirmasi, siap dijadwalkan pickup
            //PICKED_UP - Laundry sudah diambil dari customer
            //IN_PROCESS - Sedang dalam proses pencucian/dry cleaning
            //READY - Laundry sudah selesai, siap diantar
            //OUT_FOR_DELIVERY - Sedang dalam perjalanan pengantaran
            //DELIVERED - Sudah diantar ke customer
            //COMPLETED - Order selesai (customer sudah terima dan bayar)
            //CANCELLED - Order dibatalkan

            $table->enum('payment_status', ['UNPAID', 'PAID', 'EXPIRED'])->default('UNPAID');
            $table->decimal('total_weight', 5, 2)->nullable();
            $table->decimal('subtotal_amount', 12, 2)->default(0);
            $table->decimal('delivery_fee', 10, 2)->default(0);
            $table->decimal('total_amount', 12, 2)->default(0);
            $table->text('notes')->nullable();
            $table->timestamp('completed_date')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
