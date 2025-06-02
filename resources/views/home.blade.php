<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alkhabi Laundry - Layanan Laundry Terbaik</title>
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
@include('navbar')
@include('hero')

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


    <!-- About Us Section -->
    <div id="tentang" class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center">
                <h2 class="text-base text-pink-600 font-semibold tracking-wide uppercase">Tentang Kami</h2>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    Kenapa Memilih Alkhabi Laundry?
                </p>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                    Alkhabi Laundry adalah layanan laundry profesional yang telah melayani ribuan pelanggan sejak 2015
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
                            <p class="text-gray-500 italic">"Layanan Alkhabi sangat memuaskan. Pakaian saya selalu bersih, wangi, dan rapi. Sangat direkomendasikan!"</p>
                            <p class="mt-2 font-medium">- Sari Dewi</p>
                        </div>
                        <div class="bg-white p-4 rounded shadow-sm">
                            <p class="text-gray-500 italic">"Saya sangat sibuk dan Alkhabi membantu saya menghemat waktu. Layanan antar jemput mereka sangat membantu."</p>
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
                                    <p>info@alkhabi.id</p>
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