{{--
File: resources/views/riwayat/partials/tabel-riwayat.blade.php
--}}

<div class="hidden md:block overflow-x-auto">
    <table class="min-w-full">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pelanggan</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Layanan & Paket</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($pesanan as $p)
                <tr class="hover:bg-pink-50/50 transition-colors duration-200">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-semibold text-gray-900">{{ $p->nama_pelanggan }}</div>
                        <div class="text-sm text-gray-500">{{ $p->no_hp }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                         <div class="text-sm text-gray-900 capitalize">{{ $p->jenis_layanan }}</div>
                         <div class="text-sm text-gray-500 capitalize">{{ $p->paket }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        <span @class([
                            'px-2.5 py-1 inline-flex text-xs leading-5 font-semibold rounded-full capitalize',
                            'bg-yellow-100 text-yellow-800' => $p->status == 'Menunggu Konfirmasi',
                            'bg-blue-100 text-blue-800' => $p->status == 'Menunggu Pembayaran',
                            'bg-purple-100 text-purple-800' => $p->status == 'Diproses',
                            'bg-green-100 text-green-800' => $p->status == 'Lunas' || $p->status == 'Selesai',
                            'bg-red-100 text-red-800' => $p->status == 'Dibatalkan',
                        ])>
                            {{ str_replace('_', ' ', $p->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $p->created_at->format('d M Y') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        @if($p->status == 'Menunggu Pembayaran')
                            <a href="{{ route('pembayaran.show', $p) }}" class="text-pink-600 hover:text-pink-900 font-semibold">Bayar</a>
                        @else
                            {{-- PERUBAHAN DI SINI --}}
                            <a href="{{ route('riwayat.show', $p) }}" class="text-indigo-600 hover:text-indigo-900">Detail</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="md:hidden grid grid-cols-1 gap-4">
    @foreach($pesanan as $p)
        <div class="bg-white p-4 rounded-xl shadow-md border border-gray-200">
            <div class="flex justify-between items-start">
                <div>
                    <h4 class="font-bold text-lg text-pink-600">{{ $p->nama_pelanggan }}</h4>
                    <span class="text-xs text-gray-500">{{ $p->created_at->format('d M Y, H:i') }}</span>
                </div>
                <span @class([
                    'px-2.5 py-1 inline-flex text-xs leading-5 font-semibold rounded-full capitalize',
                    'bg-yellow-100 text-yellow-800' => $p->status == 'Menunggu Konfirmasi',
                    'bg-blue-100 text-blue-800' => $p->status == 'Menunggu Pembayaran',
                    'bg-purple-100 text-purple-800' => $p->status == 'Diproses',
                    'bg-green-100 text-green-800' => $p->status == 'Lunas' || $p->status == 'Selesai',
                    'bg-red-100 text-red-800' => $p->status == 'Dibatalkan',
                ])>
                    {{ str_replace('_', ' ', $p->status) }}
                </span>
            </div>
            <div class="mt-4 pt-4 border-t border-gray-100 space-y-2 text-sm">
                <p><strong class="text-gray-600 w-20 inline-block">Layanan</strong>: <span class="capitalize">{{ $p->jenis_layanan }}</span></p>
                <p><strong class="text-gray-600 w-20 inline-block">Paket</strong>: <span class="px-2 py-0.5 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800 capitalize">{{ $p->paket }}</span></p>
            </div>
            <div class="mt-4 pt-3 border-t border-gray-100 text-right">
                    @if($p->status == 'Menunggu Pembayaran')
                        <a href="{{ route('pembayaran.show', $p) }}" class="text-sm font-semibold text-pink-600 hover:text-pink-900">Bayar Sekarang &rarr;</a>
                    @else
                        {{-- PERUBAHAN DI SINI --}}
                        <a href="{{ route('riwayat.show', $p) }}" class="text-sm font-semibold text-indigo-600 hover:text-indigo-900">Lihat Detail &rarr;</a>
                    @endif
            </div>
        </div>
    @endforeach
</div>
