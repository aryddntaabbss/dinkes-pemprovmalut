<div class="relative isolate h-screen flex items-center justify-center">
    <!-- Slideshow CSS -->
    <style>
        .slideshow {
            position: absolute;
            inset: 0;
            z-index: -1;
            background-size: cover;
            background-position: center;
            animation: fade 15s infinite;
        }

        @keyframes fade {
            0% {
                opacity: 1;
            }

            33% {
                opacity: 0;
            }

            66% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        .slideshow:nth-child(1) {
            animation-delay: 0s;
        }

        .slideshow:nth-child(2) {
            animation-delay: 5s;
        }

        .slideshow:nth-child(3) {
            animation-delay: 10s;
        }
    </style>

    <!-- Slideshow Background -->
    <div class="slideshow" style="background-image: url('{{ asset('images/landscape-1.jpg') }}');"></div>
    <div class="slideshow" style="background-image: url('{{ asset('images/landscape-2.jpg') }}');"></div>
    <div class="slideshow" style="background-image: url('{{ asset('images/landscape-3.jpg') }}');"></div>

    <!-- Hero Content -->
    <div class="relative px-6 text-center">
        <div class="mx-auto max-w-2xl">
            <h1 class="text-4xl font-bold tracking-tight text-white sm:text-6xl drop-shadow-lg shadow-black">
                Dinas Kesehatan Provinsi Maluku Utara
            </h1>
            <p class="mt-8 text-lg text-white shad sm:text-xl drop-shadow-lg shadow-black">
                Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo. Elit sunt amet
                fugiat veniam occaecat.
            </p>
        </div>
    </div>
</div>