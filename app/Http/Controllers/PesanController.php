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
    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'alamat' => 'required|string',
            'jenis_layanan' => 'required|array',
            'paket' => 'required|string|in:reguler,ekspress,kilat',
        ]);

        Pesan::create([
            'nama_pelanggan' => $request->nama_pelanggan,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'jenis_layanan' => implode(',', $request->jenis_layanan), // simpan sebagai string terpisah koma
            'paket' => $request->paket,
        ]);

        return redirect()->route('pesan.index')->with('success', 'Pesanan berhasil dibuat!');
    }
}
