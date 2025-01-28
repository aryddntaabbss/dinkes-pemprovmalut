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

            /* Flexbox untuk memastikan footer selalu di bawah */
            body,
            html {
                height: 100%;
                margin: 0;
            }

            .min-h-screen {
                display: flex;
                flex-direction: column;
                height: 100%;
            }

            main {
                flex: 1;
                opacity: 0;
                transition: opacity 0.5s ease-in-out;
                /* Efek transisi */
            }

            /* Styling untuk loading spinner */
            #loading {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: #ffffff;
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                z-index: 9999;
            }

            .spinner {
                border: 4px solid #51d3e4;
                border-top: 6px solid #22818e;
                border-radius: 50%;
                width: 50px;
                height: 50px;
                animation: spin 2s linear infinite;
            }

            /* Animasi untuk spinner */
            @keyframes spin {
                0% {
                    transform: rotate(0deg);
                }

                100% {
                    transform: rotate(360deg);
                }
            }

            /* Styling untuk tulisan loading */
            #loading h2 {
                margin-top: 15px;
                font-size: 1.5rem;
                font-weight: semibold;
                color: #22818e;
                text-align: center;
            }

            /* Konten yang fade-in */
            .content-fade {
                opacity: 1 !important;
            }
        </style>
    </head>

    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">

            <!-- Loading Spinner -->
            <div id="loading">
                <div class="spinner"></div>
                <h2>Loading...</h2>
            </div>

            @include('components.top-bar')
            @include('components.header')

            <!-- Page Content -->
            <main class="flex-grow">
                @yield('body')
            </main>
            @include('components.to-top')
            @include('components.footer')
        </div>

        <script>
            // Menghapus spinner ketika halaman selesai dimuat dan memberikan efek fade-in pada konten
        window.onload = function () {
            document.getElementById("loading").style.display = "none";
            document.querySelector('main').classList.add('content-fade');
        }
        </script>
    </body>

</html>