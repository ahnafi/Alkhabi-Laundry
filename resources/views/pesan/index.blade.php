@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-6">
    <h2 class="text-3xl font-semibold text-pink-600 mb-6">Daftar Pesanan</h2>

    <a href="{{ route('pesan.create') }}" class="bg-pink-500 hover:bg-pink-600 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
        + Buat Pesanan Baru
    </a>

    @if (session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full table-auto text-sm text-gray-700">
            <thead class="bg-pink-100">
                <tr>
                    <th class="px-4 py-2">Nama</th>
                    <th class="px-4 py-2">No HP</th>
                    <th class="px-4 py-2">Alamat</th>
                    <th class="px-4 py-2">Layanan</th>
                    <th class="px-4 py-2">Paket</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pesanan as $pesan)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $pesan->nama_pelanggan }}</td>
                    <td class="px-4 py-2">{{ $pesan->no_hp }}</td>
                    <td class="px-4 py-2">{{ $pesan->alamat }}</td>
                    <td class="px-4 py-2">{{ $pesan->jenis_layanan }}</td>
                    <td class="px-4 py-2 capitalize">{{ $pesan->paket }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
