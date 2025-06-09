<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayarans';

    protected $fillable = [
        'pesanan_id',
        'jumlah_bayar',
        'metode_pembayaran',
        'status_pembayaran',
        'transaction_id',
    ];

    public function pesan()
    {
        return $this->belongsTo(Pesan::class, 'pesanan_id');
    }
}
