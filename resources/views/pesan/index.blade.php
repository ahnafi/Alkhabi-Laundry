{{--
File: resources/views/pesan/index.blade.php (Desain Ulang)
--}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-pink-50 via-white to-pink-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/80 backdrop-blur-sm overflow-hidden shadow-lg sm:rounded-2xl border border-gray-200">
                <div class="p-6 md:p-8 text-gray-900">

                    {{-- Header dan Tombol Aksi --}}
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8">
                        <div>
                            <h3 class="text-2xl font-bold text-pink-600">Riwayat Pesanan</h3>
                            <p class="mt-1 text-sm text-gray-500">Lihat semua pesanan yang pernah Anda buat.</p>
                        </div>
                        <a href="{{ route('pesan.create') }}" class="mt-4 sm:mt-0 inline-flex items-center px-5 py-2.5 bg-pink-500 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-pink-600 active:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                            <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            Buat Pesanan Baru
                        </a>
                    </div>

                    {{-- Notifikasi Sukses --}}
                    @if (session('success'))
                        <div class="mb-6 bg-green-100 border-l-4 border-green-500 text-green-700 px-4 py-3 rounded-lg" role="alert">
                            <p class="font-bold">Sukses!</p>
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif

                    {{-- Kontainer Tabel Responsif --}}
                    <div class="w-full">
                        @if($pesanan->isEmpty())
                            {{-- Tampilan Saat Tidak Ada Pesanan --}}
                            <div class="text-center py-16 px-6 border-2 border-dashed border-pink-200 rounded-lg bg-pink-50/50">
                                <svg class="mx-auto h-12 w-12 text-pink-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                  <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                <h3 class="mt-4 text-lg font-medium text-pink-800">Anda Belum Punya Pesanan</h3>
                                <p class="mt-1 text-sm text-gray-500">Mari buat pesanan pertama Anda dan nikmati layanan kami!</p>
                            </div>
                        @else
                            {{-- Tabel untuk Desktop --}}
                            <div class="hidden md:block overflow-x-auto rounded-xl border border-gray-200">
                                <table class="min-w-full">
                                    <thead class="bg-pink-100">
                                        <tr>
                                            <th scope="col" class="px-6 py-4 text-left text-sm font-semibold text-pink-800">Nama Pelanggan</th>
                                            <th scope="col" class="px-6 py-4 text-left text-sm font-semibold text-pink-800">No HP</th>
                                            <th scope="col" class="px-6 py-4 text-left text-sm font-semibold text-pink-800">Layanan</th>
                                            <th scope="col" class="px-6 py-4 text-left text-sm font-semibold text-pink-800">Paket</th>
                                            <th scope="col" class="px-6 py-4 text-left text-sm font-semibold text-pink-800">Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach($pesanan as $pesan)
                                            <tr class="hover:bg-pink-50/50 transition-colors duration-200">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $pesan->nama_pelanggan }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $pesan->no_hp }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $pesan->jenis_layanan }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 capitalize">{{ $pesan->paket }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $pesan->created_at->format('d M Y') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            {{-- Tampilan Kartu untuk Mobile --}}
                            <div class="md:hidden grid grid-cols-1 gap-4">
                                @foreach($pesanan as $pesan)
                                    <div class="bg-white p-4 rounded-xl shadow-md border border-gray-200">
                                        <div class="flex justify-between items-center">
                                            <h4 class="font-bold text-lg text-pink-600">{{ $pesan->nama_pelanggan }}</h4>
                                            <span class="text-xs text-gray-500 bg-gray-100 px-2 py-1 rounded-full">{{ $pesan->created_at->format('d M Y') }}</span>
                                        </div>
                                        <div class="mt-4 pt-4 border-t border-gray-100 space-y-2 text-sm">
                                            <p><strong class="text-gray-600">No HP:</strong> {{ $pesan->no_hp }}</p>
                                            <p><strong class="text-gray-600">Layanan:</strong> {{ $pesan->jenis_layanan }}</p>
                                            <p><strong class="text-gray-600">Paket:</strong> <span class="capitalize font-semibold text-pink-700 bg-pink-100 px-2 py-1 rounded-md">{{ $pesan->paket }}</span></p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
