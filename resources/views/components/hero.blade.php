<div class="relative isolate h-screen flex items-center justify-center">
    <style>
        .slideshow-container {
            position: absolute;
            inset: 0;
            z-index: -1;
        }

        .slideshow {
            position: absolute;
            inset: 0;
            background-size: cover;
            background-position: center;
            opacity: 0;
            transition: opacity 1s ease-in-out;
            animation-fill-mode: forwards;
        }

        @keyframes fade {
            0% {
                opacity: 0;
            }

            10% {
                opacity: 1;
            }

            45% {
                opacity: 1;
            }

            55% {
                opacity: 0;
            }

            100% {
                opacity: 0;
            }
        }

        /* Animasi untuk desktop slideshow */
        .desktop-slideshow:nth-child(1) {
            animation: fade 12s infinite;
        }

        .desktop-slideshow:nth-child(2) {
            animation: fade 12s infinite;
            animation-delay: 6s;
        }

        /* Animasi untuk mobile slideshow */
        .mobile-slideshow:nth-child(1) {
            animation: fade 12s infinite;
        }

        .mobile-slideshow:nth-child(2) {
            animation: fade 12s infinite;
            animation-delay: 6s;
        }
    </style>

    <div class="slideshow-container">
        <!-- Desktop Slideshow: hanya tampil di md ke atas -->
        <div class="slideshow desktop-slideshow hidden md:block"
            style="background-image: url('{{ asset('images/landscape-1.jpg') }}')"></div>
        <div class="slideshow desktop-slideshow hidden md:block"
            style="background-image: url('{{ asset('images/landscape-2.jpg') }}')"></div>

        <!-- Mobile Slideshow: hanya tampil di bawah md -->
        <div class="slideshow mobile-slideshow block md:hidden"
            style="background-image: url('{{ asset('images/mobile-1.jpg') }}')"></div>
        <div class="slideshow mobile-slideshow block md:hidden"
            style="background-image: url('{{ asset('images/mobile-2.jpg') }}')"></div>
    </div>

    <div class="relative px-6 text-center p-5">
        <div class="mx-auto max-w-2xl">
            <h1 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl drop-shadow-lg">
                Selamat Datang di Website
            </h1>
            <h2 class="text-2xl font-semibold tracking-tight text-white sm:text-3xl drop-shadow-lg mt-4">
                Dinas Kesehatan Provinsi Maluku Utara
            </h2>
        </div>
    </div>
</div>