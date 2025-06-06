{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>

        <style>
            .pink-gradient {
                background: linear-gradient(135deg, #fbcfe8 0%, #db2777 100%);
            }
            .text-shadow {
                text-shadow: 1px 1px 3px rgba(0,0,0,0.2);
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen">
            @include('layouts.navigation')

            <main class="relative z-0">
                {{ $slot }}
            </main>
        </div>

        @stack('scripts')
    </body>
</html>