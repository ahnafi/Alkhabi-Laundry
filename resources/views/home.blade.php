<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PinkWash Laundry - Layanan Laundry Terbaik</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .pink-gradient {
            background: linear-gradient(135deg, #fbcfe8 0%, #db2777 100%);
        }
        .text-shadow {
            text-shadow: 1px 1px 3px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body class="bg-pink-50 font-sans">
    <!-- Navbar -->
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <span class="text-pink-600 font-bold text-2xl">PinkWash</span>
                    </div>
                    <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                        <a href="#" class="border-pink-500 text-pink-600 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Beranda
                        </a>
                        <a href="#layanan" class="border-transparent text-gray-500 hover:border-pink-300 hover:text-pink-500 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Layanan
                        </a>
                        <a href="#harga" class="border-transparent text-gray-500 hover:border-pink-300 hover:text-pink-500 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Harga
                        </a>
                        <a href="#tentang" class="border-transparent text-gray-500 hover:border-pink-300 hover:text-pink-500 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Tentang Kami
                        </a>
                        <a href="#kontak" class="border-transparent text-gray-500 hover:border-pink-300 hover:text-pink-500 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Kontak
                        </a>
                    </div>
                </div>
                <div class="-mr-2 flex items-center sm:hidden">
                    <button type="button" class="mobile-menu-button inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-pink-500" aria-expanded="false">
                        <span class="sr-only">Buka menu utama</span>
                        <!-- Icon when menu is closed -->
                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <!-- Icon when menu is open -->
                        <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state -->
        <div class="mobile-menu hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <a href="#" class="bg-pink-50 border-pink-500 text-pink-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Beranda</a>
                <a href="#layanan" class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-pink-300 hover:text-pink-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Layanan</a>
                <a href="#harga" class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-pink-300 hover:text-pink-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Harga</a>
                <a href="#tentang" class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-pink-300 hover:text-pink-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Tentang Kami</a>
                <a href="#kontak" class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-pink-300 hover:text-pink-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Kontak</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="relative overflow-hidden">
        <div class="pink-gradient absolute inset-0 opacity-20"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 relative">
            <div class="text-center">
                <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                    <span class="block text-pink-600">PinkWash Laundry</span>
                    <span class="block text-pink-800">Bersih, Wangi, Rapi</span>
                </h1>
                <p class="mt-3 max-w-md mx-auto text-base text-gray-500 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
                    Solusi terbaik untuk kebutuhan laundry Anda. Kami mengutamakan kualitas dan kepuasan pelanggan.
                </p>
                <div class="mt-5 max-w-md mx-auto sm:flex sm:justify-center md:mt-8">
                    <div class="rounded-md shadow">
                        <a href="#kontak" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-pink-600 hover:bg-pink-700 md:py-4 md:text-lg md:px-10">
                            Hubungi Kami
                        </a>
                    </div>
                    <div class="mt-3 rounded-md shadow sm:mt-0 sm:ml-3">
                        <a href="#layanan" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-pink-600 bg-white hover:bg-gray-50 md:py-4 md:text-lg md:px-10">
                            Lihat Layanan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Features/Services Section -->
    <div id="layanan" class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center">
                <h2 class="text-base text-pink-600 font-semibold tracking-wide uppercase">Layanan Kami</h2>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    Solusi Laundry Lengkap
                </p>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                    Kami menyediakan berbagai layanan laundry untuk memenuhi kebutuhan Anda
                </p>
            </div>

            <div class="mt-10">
                <dl class="space-y-10 md:space-y-0 md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-10">
                    <div class="relative">
                        <dt>
                            <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-pink-500 text-white">
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                            </div>
                            <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Cuci & Lipat</p>
                        </dt>
                        <dd class="mt-2 ml-16 text-base text-gray-500">
                            Layanan cuci dan lipat dengan detergen premium dan pewangi pilihan.
                        </dd>
                    </div>

                    <div class="relative">
                        <dt>
                            <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-pink-500 text-white">
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Dry Cleaning</p>
                        </dt>
                        <dd class="mt-2 ml-16 text-base text-gray-500">
                            Perawatan khusus untuk pakaian formal, jas, gaun, dan pakaian berbahan khusus.
                        </dd>
                    </div>

                    <div class="relative">
                        <dt>
                            <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-pink-500 text-white">
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Express Service</p>
                        </dt>
                        <dd class="mt-2 ml-16 text-base text-gray-500">
                            Layanan kilat untuk kebutuhan mendesak, siap dalam waktu 6 jam.
                        </dd>
                    </div>

                    <div class="relative">
                        <dt>
                            <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-pink-500 text-white">
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                            </div>
                            <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Antar Jemput</p>
                        </dt>
                        <dd class="mt-2 ml-16 text-base text-gray-500">
                            Layanan antar jemput gratis untuk area tertentu dengan minimal order.
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>

    <!-- Pricing Section -->
    <div id="harga" class="bg-pink-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center">
                <h2 class="text-base text-pink-600 font-semibold tracking-wide uppercase">Harga</h2>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    Harga Terjangkau untuk Semua Kebutuhan
                </p>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                    Pilih paket yang sesuai dengan kebutuhan Anda
                </p>
            </div>

            <div class="mt-10">
                <div class="space-y-4 sm:space-y-0 sm:grid sm:grid-cols-2 sm:gap-6 lg:grid-cols-3">
                    <div class="border border-pink-200 rounded-lg shadow-sm p-6 bg-white">
                        <h3 class="text-xl font-medium text-pink-600">Regular</h3>
                        <p class="mt-4 text-gray-500">Untuk kebutuhan sehari-hari</p>
                        <p class="mt-8">
                            <span class="text-4xl font-extrabold text-gray-900">Rp 7.000</span>
                            <span class="text-base font-medium text-gray-500">/kg</span>
                        </p>
                        <ul class="mt-6 space-y-4">
                            <li class="flex items-start">
                                <div class="flex-shrink-0">
                                    <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <p class="ml-3 text-base text-gray-500">Cuci & lipat</p>
                            </li>
                            <li class="flex items-start">
                                <div class="flex-shrink-0">
                                    <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <p class="ml-3 text-base text-gray-500">Pewangi standar</p>
                            </li>
                            <li class="flex items-start">
                                <div class="flex-shrink-0">
                                    <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <p class="ml-3 text-base text-gray-500">Proses 2 hari</p>
                            </li>
                        </ul>
                        <a href="#kontak" class="mt-8 block w-full bg-pink-600 border border-pink-600 rounded-md py-2 text-sm font-semibold text-white text-center hover:bg-pink-700">Pilih Paket</a>
                    </div>

                    <div class="border border-pink-200 rounded-lg shadow-lg p-6 bg-white relative">
                        <span class="absolute top-0 right-6 -translate-y-1/2 transform bg-pink-500 text-white px-3 py-1 text-sm font-medium rounded-full">Populer</span>
                        <h3 class="text-xl font-medium text-pink-600">Premium</h3>
                        <p class="mt-4 text-gray-500">Untuk perawatan lebih</p>
                        <p class="mt-8">
                            <span class="text-4xl font-extrabold text-gray-900">Rp 12.000</span>
                            <span class="text-base font-medium text-gray-500">/kg</span>
                        </p>
                        <ul class="mt-6 space-y-4">
                            <li class="flex items-start">
                                <div class="flex-shrink-0">
                                    <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <p class="ml-3 text-base text-gray-500">Cuci & lipat</p>
                            </li>
                            <li class="flex items-start">
                                <div class="flex-shrink-0">
                                    <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <p class="ml-3 text-base text-gray-500">Pewangi premium</p>
                            </li>
                            <li class="flex items-start">
                                <div class="flex-shrink-0">
                                    <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <p class="ml-3 text-base text-gray-500">Proses 1 hari</p>
                            </li>
                            <li class="flex items-start">
                                <div class="flex-shrink-0">
                                    <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <p class="ml-3 text-base text-gray-500">Setrika rapi</p>
                            </li>
                        </ul>
                        <a href="#kontak" class="mt-8 block w-full bg-pink-600 border border-pink-600 rounded-md py-2 text-sm font-semibold text-white text-center hover:bg-pink-700">Pilih Paket</a>
                    </div>

                    <div class="border border-pink-200 rounded-lg shadow-sm p-6 bg-white">
                        <h3 class="text-xl font-medium text-pink-600">Express</h3>
                        <p class="mt-4 text-gray-500">Untuk kebutuhan mendesak</p>
                        <p class="mt-8">
                            <span class="text-4xl font-extrabold text-gray-900">Rp 15.000</span>
                            <span class="text-base font-medium text-gray-500">/kg</span>
                        </p>
                        <ul class="mt-6 space-y-4">
                            <li class="flex items-start">
                                <div class="flex-shrink-0">
                                    <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <p class="ml-3 text-base text-gray-500">Cuci & lipat</p>
                            </li>
                            <li class="flex items-start">
                                <div class="flex-shrink-0">
                                    <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <p class="ml-3 text-base text-gray-500">Pewangi premium</p>
                            </li>
                            <li class="flex items-start">
                                <div class="flex-shrink-0">
                                    <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <p class="ml-3 text-base text-gray-500">Proses 6 jam</p>
                            </li>
                            <li class="flex items-start">
                                <div class="flex-shrink-0">
                                    <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <p class="ml-3 text-base text-gray-500">Antar jemput gratis</p>
                            </li>
                        </ul>
                        <a href="#kontak" class="mt-8 block w-full bg-pink-600 border border-pink-600 rounded-md py-2 text-sm font-semibold text-white text-center hover:bg-pink-700">Pilih Paket</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- About Us Section -->
    <div id="tentang" class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center">
                <h2 class="text-base text-pink-600 font-semibold tracking-wide uppercase">Tentang Kami</h2>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    Kenapa Memilih PinkWash Laundry?
                </p>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                    PinkWash Laundry adalah layanan laundry profesional yang telah melayani ribuan pelanggan sejak 2015
                </p>
            </div>

            <div class="mt-10">
                <div class="space-y-10 md:space-y-0 md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-10">
                    <div class="bg-pink-50 p-6 rounded-lg">
                        <h3 class="text-lg font-medium text-pink-600 mb-4">Visi Kami</h3>
                        <p class="text-gray-500">
                            Menjadi penyedia layanan laundry terbaik dengan kualitas premium yang terjangkau untuk semua kalangan. Kami berkomitmen untuk selalu menghadirkan kepuasan pelanggan melalui layanan yang profesional dan ramah.
                        </p>
                    </div>

                    <div class="bg-pink-50 p-6 rounded-lg">
                        <h3 class="text-lg font-medium text-pink-600 mb-4">Nilai-Nilai Kami</h3>
                        <ul class="text-gray-500 space-y-2">
                            <li class="flex items-center">
                                <svg class="h-5 w-5 text-pink-500 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                Kualitas tanpa kompromi
                            </li>
                            <li class="flex items-center">
                                <svg class="h-5 w-5 text-pink-500 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                Kepuasan pelanggan
                            </li>
                            <li class="flex items-center">
                                <svg class="h-5 w-5 text-pink-500 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                Ramah lingkungan
                            </li>
                            <li class="flex items-center">
                                <svg class="h-5 w-5 text-pink-500 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                Inovasi berkelanjutan
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="mt-10 bg-pink-50 p-6 rounded-lg text-center">
                    <h3 class="text-lg font-medium text-pink-600 mb-4">Testimoni Pelanggan</h3>
                    <div class="mt-6 grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3">
                        <div class="bg-white p-4 rounded shadow-sm">
                            <p class="text-gray-500 italic">"Layanan PinkWash sangat memuaskan. Pakaian saya selalu bersih, wangi, dan rapi. Sangat direkomendasikan!"</p>
                            <p class="mt-2 font-medium">- Sari Dewi</p>
                        </div>
                        <div class="bg-white p-4 rounded shadow-sm">
                            <p class="text-gray-500 italic">"Saya sangat sibuk dan PinkWash membantu saya menghemat waktu. Layanan antar jemput mereka sangat membantu."</p>
                            <p class="mt-2 font-medium">- Budi Santoso</p>
                        </div>
                        <div class="bg-white p-4 rounded shadow-sm">
                            <p class="text-gray-500 italic">"Kualitas terbaik dengan harga terjangkau. Sudah 3 tahun langganan dan tidak pernah kecewa."</p>
                            <p class="mt-2 font-medium">- Ani Wijaya</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div id="kontak" class="py-12 bg-pink-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center">
                <h2 class="text-base text-pink-600 font-semibold tracking-wide uppercase">Kontak</h2>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    Hubungi Kami
                </p>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                    Kami siap melayani kebutuhan laundry Anda
                </p>
            </div>

            <div class="mt-10 sm:flex">
                <div class="w-full sm:w-1/2 mb-6 sm:mb-0 sm:pr-4">
                    <div class="bg-white p-6 rounded-lg shadow-sm">
                        <h3 class="text-lg font-medium text-pink-600 mb-4">Informasi Kontak</h3>
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <svg class="h-6 w-6 text-pink-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                <div class="ml-3 text-gray-500">
                                    <p>Jl. Laundry Bersih No. 123</p>
                                    <p>Jakarta Selatan, Indonesia</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <svg class="h-6 w-6 text-pink-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                </div>
                                <div class="ml-3 text-gray-500">
                                    <p>+62 812-3456-7890</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <svg class="h-6 w-6 text-pink-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div class="ml-3 text-gray-500">
                                    <p>info@pinkwash.id</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <svg class="h-6 w-6 text-pink-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="ml-3 text-gray-500">
                                    <p>Senin - Sabtu: 08.00 - 20.00</p>
                                    <p>Minggu: 10.00 - 16.00</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full sm:w-1/2 sm:pl-4">
                    <div class="bg-white p-6 rounded-lg shadow-sm">
                        <h3 class="text-lg font-medium text-pink-600 mb-4">Kirim Pesan</h3>
                        <form action="#" method="POST" class="space-y-4">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                                <input type="text" name="name" id="name" class="mt-1 focus:ring-pink-500 focus:border-pink-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" name="email" id="email" class="mt-1 focus:ring-pink-500 focus:border-pink-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700">Telepon</label>
                                <input type="tel" name="phone" id="phone" class="mt-1 focus:ring-pink-500 focus:border-pink-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <div>
                                <label for="message" class="block text-sm font-medium text-gray-700">Pesan</label>
                                <textarea id="message" name="message" rows="4" class="mt-1 focus:ring-pink-500 focus:border-pink-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                            </div>
                            <div>
                                <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-pink-600 hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500">
                                    Kirim Pesan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-pink-800">
        <div class="max-w-7xl mx-auto py-12 px-4 overflow-hidden sm:px-6 lg:px-8">
            <div class="mt-8 flex justify-center space-x-6">
                <a href="#" class="text-pink-100 hover:text-white">
                    <span class="sr-only">Facebook</span>
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                    </svg>
                </a>
                <a href="#" class="text-pink-100 hover:text-white">
                    <span class="sr-only">Instagram</span>
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                    </svg>
                </a>
                <a href="#" class="text-pink-100 hover:text-white">
                    <span class="sr-only">Twitter</span>
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                    </svg>
                </a>
            </div>
            <p class="mt-8 text-center text-base text-pink-100">
                &copy; 2025 PinkWash Laundry. Semua hak dilindungi.
            </p>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        const mobileMenuButton = document.querySelector('.mobile-menu-button');
        const mobileMenu = document.querySelector('.mobile-menu');
        
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
            
            // Toggle icons
            const icons = mobileMenuButton.querySelectorAll('svg');
            icons.forEach(icon => {
                icon.classList.toggle('hidden');
            });
        });
        
        // Close mobile menu when clicking on a link
        const mobileLinks = document.querySelectorAll('.mobile-menu a');
        mobileLinks.forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
                
                // Show/hide correct icons
                const icons = mobileMenuButton.querySelectorAll('svg');
                icons[0].classList.remove('hidden');
                icons[1].classList.add('hidden');
            });
        });

        // Smooth scrolling for all anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>
</html>