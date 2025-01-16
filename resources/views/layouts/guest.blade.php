<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Favicons -->
        <link href="{{ asset('images/logo.png') }}" rel="icon">
        <link href="{{ asset('images/logo.png') }}" rel="apple-touch-icon">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="font-sans bg-teal-600 text-gray-900 antialiased">
        <div class="min-h-screen flex">
            <!-- Image Section -->

            <div class="hidden md:block w-1/2 bg-cover bg-center"
                style="background-image: url('{{ asset('images/auth.png') }}')">
                <h1
                    class="text-2xl font-bold tracking-tight text-black sm:text-4xl drop-shadow-lg pt-28 text-center shadow-black">

                </h1>
            </div>

            <!-- Login Form Section -->
            <div class="w-full md:w-1/2 flex flex-col items-center justify-center">
                <div class="mb-8">
                    <a href="/">
                        <img class="h-16 w-auto" src="{{ asset('images/logo-dinkes.png') }}" alt="Logo">
                    </a>
                </div>
                <div
                    class="w-full sm:max-w-md bg-white bg-opacity-90 rounded-md px-6 py-4 overflow-hidden sm:rounded-lg">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>

</html>