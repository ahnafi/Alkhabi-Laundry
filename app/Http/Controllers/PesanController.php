<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesan;

class PesanController extends Controller
{
    // Menampilkan semua pesanan (halaman utama pesan user)
    public function index()
    {
        $pesanan = Pesan::all();
        return view('pesan.index', compact('pesanan'));
    }

    // Menampilkan form untuk create pesanan
    public function create()
    {
        return view('pesan.create');
    }

    // Menyimpan data pesanan ke database
    // Menyimpan data pesanan ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'alamat' => 'required|string',
            // PERBAIKAN 1: Diubah dari 'array' menjadi 'string'
            'jenis_layanan' => 'required|string', 
            'paket' => 'required|string|in:reguler,ekspress,kilat',
        ]);

        Pesan::create([
            'nama_pelanggan' => $request->nama_pelanggan,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            // PERBAIKAN 2: 'implode' dihapus
            'jenis_layanan' => $request->jenis_layanan,
            'paket' => $request->paket,
        ]);

        return redirect()->route('pesan.index')->with('success', 'Pesanan berhasil dibuat!');
    }
}
