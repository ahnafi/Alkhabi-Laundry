<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pesans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelanggan');
            $table->string('no_hp');
            $table->text('alamat');
            $table->string('jenis_layanan'); 
            $table->string('paket'); 
            
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->string('status')->default('Menunggu Konfirmasi');
            
            $table->decimal('berat', 8, 2)->nullable(); // contoh: 4.50 kg
            $table->unsignedInteger('total_harga')->nullable(); // contoh: 45000

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pesans');
    }
};
