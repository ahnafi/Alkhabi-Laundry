{{--File: resources/views/pesan/create.blade.php--}}
<x-app-layout>
    {{-- Slot untuk header halaman --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buat Pesanan Baru') }}
        </h2>
    </x-slot>

    {{-- Konten utama halaman --}}
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                
                    {{-- Form Pembuatan Pesanan --}}
                    <form action="{{ route('pesan.store') }}" method="POST" class="space-y-6">
                        @csrf

                        {{-- Input Nama Pelanggan --}}
                        <div>
                            <label for="nama_pelanggan" class="block mb-2 text-sm font-medium text-gray-900">Nama Pelanggan</label>
                            <input type="text" id="nama_pelanggan" name="nama_pelanggan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-pink-500 focus:border-pink-500 block w-full p-2.5" placeholder="Masukkan nama Anda" required>
                        </div>

                        {{-- Input No HP --}}
                        <div>
                            <label for="no_hp" class="block mb-2 text-sm font-medium text-gray-900">No. Handphone</label>
                            <input type="text" id="no_hp" name="no_hp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-pink-500 focus:border-pink-500 block w-full p-2.5" placeholder="Contoh: 08123456789" required>
                        </div>

                        {{-- Input Alamat --}}
                        <div>
                            <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900">Alamat Lengkap</label>
                            <textarea id="alamat" name="alamat" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-pink-500 focus:border-pink-500" placeholder="Masukkan alamat lengkap Anda..." required></textarea>
                        </div>

                        {{-- Checkbox Jenis Layanan --}}
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">Jenis Layanan</label>
                            <div class="flex items-center space-x-4">
                                <div class="flex items-center">
                                    <input id="kiloan" type="checkbox" name="jenis_layanan[]" value="kiloan" class="w-4 h-4 text-pink-600 bg-gray-100 border-gray-300 rounded focus:ring-pink-500">
                                    <label for="kiloan" class="ml-2 text-sm font-medium text-gray-900">Kiloan</label>
                                </div>
                                <div class="flex items-center">
                                    <input id="satuan" type="checkbox" name="jenis_layanan[]" value="satuan" class="w-4 h-4 text-pink-600 bg-gray-100 border-gray-300 rounded focus:ring-pink-500">
                                    <label for="satuan" class="ml-2 text-sm font-medium text-gray-900">Satuan</label>
                                </div>
                            </div>
                        </div>

                        {{-- Select Paket --}}
                        <div>
                            <label for="paket" class="block mb-2 text-sm font-medium text-gray-900">Pilih Paket</label>
                            <select id="paket" name="paket" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-pink-500 focus:border-pink-500 block w-full p-2.5" required>
                                <option value="" disabled selected>-- Pilih Paket --</option>
                                <option value="reguler">Reguler (2 Hari)</option>
                                <option value="ekspress">Ekspress (1 Hari / 24 Jam)</option>
                                <option value="kilat">Kilat (Setengah Hari / 12 Jam)</option>
                            </select>
                        </div>

                        {{-- Tombol Aksi --}}
                        <div class="flex items-center justify-end space-x-4 pt-4">
                            <a href="{{ route('pesan.index') }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5">
                                Batal
                            </a>
                            <button type="submit" class="text-white bg-pink-500 hover:bg-pink-600 focus:ring-4 focus:ring-pink-300 font-medium rounded-lg text-sm px-5 py-2.5">
                                Buat Pesanan
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
