{{-- resources/views/dashboard.blade.php --}}

<x-app-layout>
    <div class="bg-pink-50 font-sans">
        @include('hero')
        @include('layanan')
        @include('pricing')
        @include('aboutus')
        @include('contact')
        @include('footer')
    </div>


    @push('scripts')
    <script>
        // Mobile menu toggle
        const mobileMenuButton = document.querySelector('.mobile-menu-button');
        const mobileMenu = document.querySelector('.mobile-menu');

        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');

                // Toggle icons (menggunakan logika dari home.blade.php untuk konsistensi)
                const icons = mobileMenuButton.querySelectorAll('svg');
                icons.forEach(icon => {
                    icon.classList.toggle('hidden');
                });
            });
        }

        // Smooth scrolling for all anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();

                // Cek jika linknya hanya '#' (untuk ke atas)
                if (this.getAttribute('href') === '#') {
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                    return;
                }
                
                const targetElement = document.querySelector(this.getAttribute('href'));
                if (targetElement) {
                    targetElement.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
    @endpush

</x-app-layout>