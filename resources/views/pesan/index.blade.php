{{-- File: resources/views/pesan/index.blade.php--}}
<x-app-layout>
    {{-- Slot untuk header halaman --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Pesanan') }}
        </h2>
    </x-slot>

    {{-- Konten utama halaman --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    {{-- Tombol Buat Pesanan Baru --}}
                    <div class="mb-6">
                        <a href="{{ route('pesan.create') }}" class="bg-pink-500 hover:bg-pink-600 text-white font-bold py-2 px-4 rounded inline-block transition duration-300">
                            + Buat Pesanan Baru
                        </a>
                    </div>

                    {{-- Notifikasi Sukses --}}
                    @if (session('success'))
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 px-4 py-3 rounded mb-6" role="alert">
                            <p class="font-bold">Sukses</p>
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif

                    {{-- Tabel Daftar Pesanan --}}
                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto text-sm text-gray-700">
                            <thead class="bg-pink-100">
                                <tr>
                                    <th class="px-4 py-3 text-left">Nama</th>
                                    <th class="px-4 py-3 text-left">No HP</th>
                                    <th class="px-4 py-3 text-left">Alamat</th>
                                    <th class="px-4 py-3 text-left">Layanan</th>
                                    <th class="px-4 py-3 text-left">Paket</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pesanan as $pesan)
                                    <tr class="border-t hover:bg-gray-50">
                                        <td class="px-4 py-2">{{ $pesan->nama_pelanggan }}</td>
                                        <td class="px-4 py-2">{{ $pesan->no_hp }}</td>
                                        <td class="px-4 py-2">{{ $pesan->alamat }}</td>
                                        <td class="px-4 py-2">{{ $pesan->jenis_layanan }}</td>
                                        <td class="px-4 py-2 capitalize">{{ $pesan->paket }}</td>
                                    </tr>
                                @empty
                                    <tr class="border-t">
                                        <td colspan="5" class="text-center py-4 text-gray-500">
                                            Belum ada pesanan.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
