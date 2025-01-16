@extends('layouts.main')

@section('body')
@include('components.hero')

<section>
    <!-- Topic Nav -->
    <nav class="w-full py-4 border-t border-b bg-gray-50" x-data="{ open: false }">
        <div class="block sm:hidden">
            <a href="#"
                class="block md:hidden text-base font-bold uppercase text-center flex justify-center items-center text-teal-700"
                @click="open = !open">
                Kategori Kesehatan <i :class="open ? 'fa-chevron-down': 'fa-chevron-up'" class="fas ml-2"></i>
            </a>
        </div>
        <div :class="open ? 'block': 'hidden'" class="w-full flex-grow sm:flex sm:items-center sm:w-auto">
            <div
                class="w-full container mx-auto flex flex-col sm:flex-row items-center justify-center text-sm font-bold uppercase mt-0 px-6 py-2">
                <a href="#"
                    class="hover:bg-teal-700 hover:text-white rounded py-2 px-4 mx-2 transition-colors duration-200">Kesehatan
                    Umum</a>
                <a href="#"
                    class="hover:bg-teal-700 hover:text-white rounded py-2 px-4 mx-2 transition-colors duration-200">Penyakit
                    Menular</a>
                <a href="#"
                    class="hover:bg-teal-700 hover:text-white rounded py-2 px-4 mx-2 transition-colors duration-200">Gizi
                    &
                    Nutrisi</a>
                <a href="#"
                    class="hover:bg-teal-700 hover:text-white rounded py-2 px-4 mx-2 transition-colors duration-200">Kesehatan
                    Ibu & Anak</a>
                <a href="#"
                    class="hover:bg-teal-700 hover:text-white rounded py-2 px-4 mx-2 transition-colors duration-200">Layanan
                    Kesehatan</a>
                <a href="#"
                    class="hover:bg-teal-700 hover:text-white rounded py-2 px-4 mx-2 transition-colors duration-200">Info
                    Vaksinasi</a>
            </div>
        </div>
    </nav>


    <div class="container mx-auto flex flex-wrap py-6">

        <!-- Posts Section -->
        <section class="w-full md:w-2/3 flex flex-col items-center px-3">

            <article
                class="flex flex-col bg-white rounded-lg shadow-lg overflow-hidden transition-transform my-4 duration-300 hover:shadow-xl">
                <!-- Featured Image -->
                <div class="relative h-48 overflow-hidden">
                    <img src="{{ asset('images/landscape-1.jpg') }}" alt="Article featured image"
                        class="w-full h-full object-cover transition-transform duration-300 hover:scale-105">
                </div>

                <!-- Article Content -->
                <div class="flex flex-col flex-grow p-6 space-y-4">
                    <!-- Category -->
                    <div class="flex items-center">
                        <a href="#"
                            class="text-teal-600 text-sm font-bold uppercase tracking-wider hover:text-teal-500 transition-colors">
                            Sports
                        </a>
                    </div>

                    <!-- Title -->
                    <h2 class="text-2xl font-bold leading-tight">
                        <a href="#" class="text-gray-900 hover:text-gray-700 transition-colors">
                            Lorem Ipsum Dolor Sit Amet Dolor Sit Amet
                        </a>
                    </h2>

                    <!-- Meta Information -->
                    <div class="text-sm text-gray-600">
                        Oleh <a href="#" class="font-semibold hover:text-gray-800 transition-colors">My Blog</a>
                        <span class="mx-2">•</span>
                        <time datetime="2019-10-22">22 Oktober 2019</time>
                    </div>

                    <!-- Excerpt -->
                    <p class="text-gray-600 leading-relaxed">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus quis porta dui.
                        Ut eu iaculis massa. Sed ornare ligula lacus, quis iaculis dui porta volutpat.
                        In sit amet posuere magna..
                    </p>

                    <!-- Read More Link -->
                    <div class="pt-2">
                        <a href="#"
                            class="inline-flex items-center space-x-2 text-gray-800 font-extralight hover:text-teal-500 transition-colors">
                            <span>SELENGKAPNYA</span>
                            <i class="fas fa-arrow-right text-sm"></i>
                        </a>
                    </div>
                </div>
            </article>

            <article
                class="flex flex-col bg-white rounded-lg shadow-lg overflow-hidden transition-transform my-4 duration-300 hover:shadow-xl">
                <!-- Featured Image -->
                <div class="relative h-48 overflow-hidden">
                    <img src="{{ asset('images/landscape-2.jpg') }}" alt="Article featured image"
                        class="w-full h-full object-cover transition-transform duration-300 hover:scale-105">
                </div>

                <!-- Article Content -->
                <div class="flex flex-col flex-grow p-6 space-y-4">
                    <!-- Category -->
                    <div class="flex items-center">
                        <a href="#"
                            class="text-teal-600 text-sm font-bold uppercase tracking-wider hover:text-teal-500 transition-colors">
                            Medical
                        </a>
                    </div>

                    <!-- Title -->
                    <h2 class="text-2xl font-bold leading-tight">
                        <a href="#" class="text-gray-900 hover:text-gray-700 transition-colors">
                            Fugit harum ipsam porro
                        </a>
                    </h2>

                    <!-- Meta Information -->
                    <div class="text-sm text-gray-600">
                        Oleh <a href="#" class="font-semibold hover:text-gray-800 transition-colors">My Blog</a>
                        <span class="mx-2">•</span>
                        <time datetime="2019-10-22">22 Oktober 2019</time>
                    </div>

                    <!-- Excerpt -->
                    <p class="text-gray-600 leading-relaxed">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus quis porta dui.
                        Ut eu iaculis massa. Sed ornare ligula lacus, quis iaculis dui porta volutpat.
                        In sit amet posuere magna..
                    </p>

                    <!-- Read More Link -->
                    <div class="pt-2">
                        <a href="#"
                            class="inline-flex items-center space-x-2 text-gray-800 font-extralight hover:text-teal-500 transition-colors">
                            <span>SELENGKAPNYA</span>
                            <i class="fas fa-arrow-right text-sm"></i>
                        </a>
                    </div>
                </div>
            </article>

            <article
                class="flex flex-col bg-white rounded-lg shadow-lg overflow-hidden transition-transform my-4 duration-300 hover:shadow-xl">
                <!-- Featured Image -->
                <div class="relative h-48 overflow-hidden">
                    <img src="{{ asset('images/landscape-3.jpg') }}" alt="Article featured image"
                        class="w-full h-full object-cover transition-transform duration-300 hover:scale-105">
                </div>

                <!-- Article Content -->
                <div class="flex flex-col flex-grow p-6 space-y-4">
                    <!-- Category -->
                    <div class="flex items-center">
                        <a href="#"
                            class="text-teal-600 text-sm font-bold uppercase tracking-wider hover:text-teal-500 transition-colors">
                            Information
                        </a>
                    </div>

                    <!-- Title -->
                    <h2 class="text-2xl font-bold leading-tight">
                        <a href="#" class="text-gray-900 hover:text-gray-700 transition-colors">
                            Iusto, accusamus necessitatibus repudiandae tempore illo cupiditate?
                        </a>
                    </h2>

                    <!-- Meta Information -->
                    <div class="text-sm text-gray-600">
                        Oleh <a href="#" class="font-semibold hover:text-gray-800 transition-colors">My Blog</a>
                        <span class="mx-2">•</span>
                        <time datetime="2019-10-22">22 Oktober 2019</time>
                    </div>

                    <!-- Excerpt -->
                    <p class="text-gray-600 leading-relaxed">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus quis porta dui.
                        Ut eu iaculis massa. Sed ornare ligula lacus, quis iaculis dui porta volutpat.
                        In sit amet posuere magna..
                    </p>

                    <!-- Read More Link -->
                    <div class="pt-2">
                        <a href="#"
                            class="inline-flex items-center space-x-2 text-gray-800 font-extralight hover:text-teal-500 transition-colors">
                            <span>SELENGKAPNYA</span>
                            <i class="fas fa-arrow-right text-sm"></i>
                        </a>
                    </div>
                </div>
            </article>

            <!-- Pagination -->
            <div class="flex items-center py-8 gap-2">
                <a href="#"
                    class="h-10 w-10 rounded-md bg-teal-800 hover:bg-teal-500 font-semibold text-white text-sm flex items-center justify-center">1</a>
                <a href="#"
                    class="h-10 w-10 rounded-md font-semibold text-gray-800 hover:bg-teal-500 hover:text-white text-sm flex items-center justify-center">2</a>
                <a href="#"
                    class="h-10 w-10 font-semibold text-gray-800 hover:text-teal-500 text-sm flex items-center justify-center ml-3">Next
                    <i class="fas fa-arrow-right ml-2"></i></a>
            </div>

        </section>

        <!-- Sidebar Section -->
        <aside class="w-full md:w-1/3 flex flex-col items-center px-3">

            <div class="w-full bg-white shadow-lg rounded-lg flex flex-col my-4 p-6">
                <p class="text-xl font-semibold pb-5">About Us</p>
                <p class="pb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas mattis est eu odio
                    sagittis tristique. Vestibulum ut finibus leo. In hac habitasse platea dictumst.</p>
                <a href="#"
                    class="w-full bg-teal-800 text-white font-bold text-sm uppercase rounded hover:bg-teal-900 flex items-center justify-center px-2 py-3 mt-4">
                    Selengkapnya
                </a>
            </div>

            {{-- Berita Terpopuler --}}
            <div class="w-full bg-white shadow-lg rounded-lg flex flex-col my-4 p-6">
                <p class="text-xl font-bold pb-5">Berita Terpopuler</p>

                <div class="space-y-4">
                    <div class="flex items-center space-x-4 border-b">
                        <img class="w-14 h-auto" src="{{ asset('images/logo.png') }}" alt="Berita 2">
                        <div>
                            <h3 class="text-lg font-semibold">Berita 1</h3>
                            <p class="text-gray-600 text-justify">
                                {{ substr('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis non, eius quia porro ipsa sapiente atque dicta quibusdam nulla possimus voluptatum.', 0, 60) }}...
                            </p>
                            <div class="text-sm text-gray-500 pb-2">
                                <span>Oleh <a href="#"
                                        class="font-medium text-gray-700 hover:text-gray-900 transition-colors">My
                                        Blog</a></span>
                                <span class="mx-1">•</span>
                                <time datetime="2019-10-22">22 Oktober 2019</time>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4 border-b">
                        <img class="w-14 h-auto" src="{{ asset('images/logo.png') }}" alt="Berita 2">
                        <div>
                            <h3 class="text-lg font-semibold">Berita 2</h3>
                            <p class="text-gray-600 text-justify">
                                {{ substr('Quis non, eius quia porro ipsa sapiente atque dicta quibusdam nulla possimus voluptatum.', 0, 60) }}...
                            </p>
                            <div class="text-sm text-gray-500 pb-2">
                                <span>Oleh <a href="#"
                                        class="font-medium text-gray-700 hover:text-gray-900 transition-colors">My
                                        Blog</a></span>
                                <span class="mx-1">•</span>
                                <time datetime="2019-10-22">22 Oktober 2019</time>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </aside>



    </div>
</section>

@include('components.to-top')

@endsection