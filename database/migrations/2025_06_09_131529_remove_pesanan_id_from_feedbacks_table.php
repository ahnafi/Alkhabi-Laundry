<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('feedbacks', function (Blueprint $table) {
            // Periksa apakah foreign key 'feedbacks_pesanan_id_foreign' ada sebelum menghapusnya.
            // Nama foreign key ini biasanya dibuat otomatis oleh Laravel.
            // Kita juga bisa cek keberadaan kolom 'pesanan_id'.
            if (Schema::hasColumn('feedbacks', 'pesanan_id')) {
                // Gunakan try-catch untuk menangani jika foreign key tidak ada,
                // meskipun kolomnya mungkin masih ada.
                try {
                    $table->dropForeign('feedbacks_pesanan_id_foreign');
                } catch (\Exception $e) {
                    // Foreign key tidak ada, jadi tidak perlu melakukan apa-apa.
                    // Ini mencegah error "Can't DROP foreign key".
                }
                $table->dropColumn('pesanan_id');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('feedbacks', function (Blueprint $table) {
            // Dalam metode down(), kamu biasanya akan mengembalikan perubahan dari up().
            // Jadi, jika kamu menghapus pesanan_id di up(), di down() kamu akan menambahkannya kembali.
            // Ini hanyalah contoh, sesuaikan dengan kebutuhan aplikasimu.
            // Misalnya, jika 'pesanan_id' adalah foreignId:
            // $table->foreignId('pesanan_id')->nullable()->constrained()->onDelete('cascade');
        });
    }
};