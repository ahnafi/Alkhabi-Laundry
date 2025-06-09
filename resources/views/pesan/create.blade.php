{{--
File: resources/views/pesan/create.blade.php (Desain Ulang Final)
--}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buat Pesanan Baru') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-pink-50 via-white to-pink-50">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/80 backdrop-blur-sm overflow-hidden shadow-2xl sm:rounded-2xl border border-gray-200">
                <div class="p-6 md:p-8 text-gray-900">
                    
                    <div class="mb-8 text-center">
                        <h3 class="text-2xl font-bold text-pink-600">Formulir Pesanan Online</h3>
                        <p class="mt-1 text-sm text-gray-500">Hanya butuh beberapa detik untuk menyelesaikan.</p>
                    </div>

                    <form action="{{ route('pesan.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <div>
                            <label for="nama_pelanggan" class="block mb-2 text-sm font-medium text-gray-700">Nama Pelanggan</label>
                            <input type="text" id="nama_pelanggan" name="nama_pelanggan" class="block w-full p-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-pink-400 focus:border-pink-500 transition" placeholder="Masukkan nama Anda" required>
                        </div>

                        <div>
                            <label for="no_hp" class="block mb-2 text-sm font-medium text-gray-700">No. Handphone</label>
                            <input type="text" id="no_hp" name="no_hp" class="block w-full p-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-pink-400 focus:border-pink-500 transition" placeholder="Contoh: 08123456789" required>
                        </div>

                        <div>
                            <label for="alamat" class="block mb-2 text-sm font-medium text-gray-700">Alamat Lengkap</label>
                            <textarea id="alamat" name="alamat" rows="4" class="block w-full p-3 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-2 focus:ring-pink-400 focus:border-pink-500 transition" placeholder="Masukkan alamat lengkap untuk penjemputan..." required></textarea>
                        </div>

                        <div>
                            <label class="block mb-3 text-sm font-medium text-gray-700">Jenis Layanan</label>
                            <div class="grid grid-cols-3 gap-4">
                                
                                <label for="kiloan" class="relative flex items-center p-3 bg-white border rounded-lg cursor-pointer has-[:checked]:bg-pink-50 has-[:checked]:border-pink-500 has-[:checked]:ring-2 has-[:checked]:ring-pink-200 transition-all duration-200">
                                    <input id="kiloan" type="radio" name="jenis_layanan" value="kiloan" class="h-4 w-4 text-pink-600 border-gray-300 focus:ring-pink-500" required>
                                    <span class="ml-3 text-sm font-medium text-gray-700">Kiloan</span>
                                </label>

                                <label for="satuan" class="relative flex items-center p-3 bg-white border rounded-lg cursor-pointer has-[:checked]:bg-pink-50 has-[:checked]:border-pink-500 has-[:checked]:ring-2 has-[:checked]:ring-pink-200 transition-all duration-200">
                                    <input id="satuan" type="radio" name="jenis_layanan" value="satuan" class="h-4 w-4 text-pink-600 border-gray-300 focus:ring-pink-500" required>
                                    <span class="ml-3 text-sm font-medium text-gray-700">Satuan</span>
                                </label>

                                <label for="dryclean" class="relative flex items-center p-3 bg-white border rounded-lg cursor-pointer has-[:checked]:bg-pink-50 has-[:checked]:border-pink-500 has-[:checked]:ring-2 has-[:checked]:ring-pink-200 transition-all duration-200">
                                    <input id="dryclean" type="radio" name="jenis_layanan" value="dryclean" class="h-4 w-4 text-pink-600 border-gray-300 focus:ring-pink-500" required>
                                    <span class="ml-3 text-sm font-medium text-gray-700">Dry Clean</span>
                                </label>

                            </div>
                        </div>

                        <div>
                            <label for="paket" class="block mb-2 text-sm font-medium text-gray-700">Pilih Paket</label>
                            <select id="paket" name="paket" class="block w-full p-3 text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-400 focus:border-pink-500 transition" required>
                                <option value="" disabled selected>-- Pilih salah satu paket --</option>
                                <option value="reguler">Reguler (2 Hari)</option>
                                <option value="ekspress">Express (1 Hari / 24 Jam)</option>
                                <option value="kilat">Kilat (Setengah Hari / 12 Jam)</option>
                            </select>
                        </div>

                        <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                            
                            <a href="{{ route('riwayat.index') }}" class="px-5 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition">
                                Batal
                            </a>
                            
                            <button type="submit" class="inline-flex items-center px-5 py-2.5 bg-pink-500 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-pink-600 active:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                                Buat Pesanan
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>