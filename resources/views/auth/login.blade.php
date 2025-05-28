<x-guest-layout>
    <div class="min-h-screen flex">
        <!-- Kiri: Gambar -->
        <div class="hidden md:flex w-1/2 bg-pink-100 items-center justify-center">
            <img src="{{ asset('img/bg-login.jpg') }}" alt="Login Image" class="w-3/4 h-auto object-cover rounded-xl shadow-lg">
        </div>

        <!-- Kanan: Form Login -->
        <div class="flex w-full md:w-1/2 items-center justify-center bg-white px-8 py-12">
            <div class="max-w-md w-full space-y-6">
                <h2 class="text-3xl font-bold text-pink-600 text-center">Selamat Datang di PinkWash</h2>
                <p class="text-center text-gray-500">Masuk ke akun Anda untuk mulai mencuci dengan nyaman</p>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-pink-500 shadow-sm focus:ring-pink-500" name="remember">
                            <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-between mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-pink-500 hover:text-pink-600" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif

                        <x-primary-button class="bg-pink-500 hover:bg-pink-600 text-white">
                            {{ __('Log in') }}
                        </x-primary-button>
                    </div>
                </form>

                <p class="text-center text-sm text-gray-600">
                    Belum punya akun?
                    <a href="{{ route('register') }}" class="text-pink-500 hover:text-pink-600 font-medium">Daftar sekarang</a>
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>
