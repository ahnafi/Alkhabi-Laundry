@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6">
    <h2 class="text-3xl font-semibold text-pink-600 mb-6">Buat Pesanan</h2>

    <form action="{{ route('pesan.store') }}" method="POST" class="space-y-5 bg-white p-6 rounded-lg shadow-md">
        @csrf

        <div>
            <label class="block mb-1 text-gray-700 font-semibold">Nama Pelanggan</label>
            <input type="text" name="nama_pelanggan" class="w-full border border-gray-300 p-2 rounded" required>
        </div>

        <div>
            <label class="block mb-1 text-gray-700 font-semibold">No HP</label>
            <input type="text" name="no_hp" class="w-full border border-gray-300 p-2 rounded" required>
        </div>

        <div>
            <label class="block mb-1 text-gray-700 font-semibold">Alamat</label>
            <textarea name="alamat" class="w-full border border-gray-300 p-2 rounded" required></textarea>
        </div>

        <div>
            <label class="block mb-1 text-gray-700 font-semibold">Jenis Layanan</label>
            <div class="flex gap-4">
                <label><input type="checkbox" name="jenis_layanan[]" value="kiloan"> Kiloan</label>
                <label><input type="checkbox" name="jenis_layanan[]" value="satuan"> Satuan</label>
            </div>
        </div>

        <div>
            <label class="block mb-1 text-gray-700 font-semibold">Paket</label>
            <select name="paket" class="w-full border border-gray-300 p-2 rounded" required>
                <option value="">-- Pilih Paket --</option>
                <option value="reguler">Reguler (2 Hari)</option>
                <option value="ekspress">Ekspress (1 Hari / 24 Jam)</option>
                <option value="kilat">Kilat (Setengah Hari / 12 Jam)</option>
            </select>
        </div>

        <div class="flex justify-between">
            <a href="{{ route('pesan.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                Cancel
            </a>
            <button type="submit" class="bg-pink-500 hover:bg-pink-600 text-white font-bold py-2 px-4 rounded">
                Save
            </button>
        </div>
    </form>
</div>
@endsection
