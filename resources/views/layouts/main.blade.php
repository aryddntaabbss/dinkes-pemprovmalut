<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Favicons -->
        <link href="{{ asset('images/logo.png') }}" rel="icon">
        <link href="{{ asset('images/logo.png') }}" rel="apple-touch-icon">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        {{-- Style --}}
        <style>
            /* Untuk menyembunyikan scrollbar */
            .scrollbar-hide {
                -ms-overflow-style: none;
                /* Internet Explorer 10+ */
                scrollbar-width: none;
                /* Firefox */
            }

            .scrollbar-hide::-webkit-scrollbar {
                display: none;
                /* Safari and Chrome */
            }
        </style>
    </head>

    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('components.top-bar')
            @include('components.header')

            <!-- Page Content -->
            <main class="flex-grow">
                @yield('body')
            </main>
            @include('components.footer')
        </div>

        <script>
            window.kategoriLength = {{ count($kategori) }};
        </script>
    </body>

</html>