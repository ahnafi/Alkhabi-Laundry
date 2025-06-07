<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // GANTI 'pesan' menjadi 'pesans'
        Schema::create('pesans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelanggan');
            $table->string('no_hp');
            $table->text('alamat');
            $table->string('jenis_layanan'); 
            $table->string('paket'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // GANTI 'pesan' menjadi 'pesans' juga di sini
        Schema::dropIfExists('pesans');
    }
};