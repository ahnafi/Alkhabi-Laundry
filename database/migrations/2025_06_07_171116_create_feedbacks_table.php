<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
    
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelanggan');
            $table->tinyInteger('puas_laundry'); 
            $table->tinyInteger('puas_harga');   
            $table->text('kritik_saran')->nullable(); 
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};
