<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    /**
     * BARU: Menampilkan daftar semua tagihan yang perlu dibayar.
     */
    public function index()
    {
        $tagihans = Pesan::where('user_id', Auth::id())
                          ->where('status', 'Menunggu Pembayaran')
                          ->latest()
                          ->get();

        return view('pembayaran.index', compact('tagihans'));
    }

    /**
     * Menampilkan halaman detail pembayaran untuk sebuah pesanan.
     */
    public function show(Pesan $pesan)
    {
        // Keamanan: Pastikan user hanya bisa melihat pembayarannya sendiri
        if ($pesan->user_id !== Auth::id()) {
            abort(403, 'AKSES DITOLAK');
        }

        // Jangan tampilkan halaman pembayaran jika statusnya tidak sesuai
        if ($pesan->status !== 'Menunggu Pembayaran') {
             return redirect()->route('riwayat.index')->with('error', 'Tagihan untuk pesanan ini belum tersedia atau sudah lunas.');
        }

        return view('pembayaran.show', ['pesanan' => $pesan]);
    }

    /**
     * Mengonfirmasi pembayaran dan mengubah status pesanan.
     */
    public function konfirmasi(Request $request, Pesan $pesan)
    {
        // Keamanan tambahan
        if ($pesan->user_id !== Auth::id()) {
            abort(403, 'AKSES DITOLAK');
        }

        // Ubah status pesanan menjadi 'Lunas'
        $pesan->status = 'Lunas';
        $pesan->save();
        
        // Buat record di tabel pembayarans
        Pembayaran::create([
            'pesanan_id' => $pesan->id,
            'jumlah_bayar' => $pesan->total_harga,
            'metode_pembayaran' => 'QRIS (Konfirmasi Manual)',
            'status_pembayaran' => 'success',
        ]);

        // Redirect dengan "sinyal" untuk menampilkan modal feedback.
        return redirect()->route('riwayat.index')->with('showFeedbackModal', true);
    }
}
