@extends('layouts.main')

@section('body')
@include('components.hero')

<section>
    <!-- Topic Nav -->
    <nav class="w-full py-4 border-t border-b bg-gray-50"
        x-data="{ open: false, scrollIndex: 0, itemsPerPage: 5, totalItems: {{ count($kategori) }} }">
        <!-- Mobile Toggle Button -->
        <div class="block sm:hidden">
            <a href="#"
                class="text-base font-bold uppercase text-center flex justify-between items-center text-teal-700"
                @click="open = !open">
                Kategori Kesehatan
                <i :class="open ? 'fa-chevron-up' : 'fa-chevron-down'" class="fas ml-2"></i>
            </a>
        </div>

        <!-- Desktop Navigation with Previous and Next buttons -->
        <div :class="open ? 'block' : 'hidden'" class="w-full sm:flex sm:items-center sm:w-auto sm:px-6">
            <div
                class="w-full container mx-auto flex items-center justify-between sm:space-x-4 text-sm font-bold uppercase mt-2 sm:mt-0">

                <!-- Previous Button (Left aligned) -->
                <div class="flex items-center space-x-4">
                    <button @click="scrollIndex = Math.max(scrollIndex - itemsPerPage, 0)" :disabled="scrollIndex === 0"
                        class="flex items-center px-4 py-2 bg-teal-700 text-white rounded-md hover:bg-teal-600 transition-all duration-200 disabled:bg-gray-300 disabled:cursor-not-allowed">
                        <i class="fas fa-chevron-left mr-2"></i> Previous
                    </button>
                </div>

                <!-- Category Links (Scrollable) -->
                <div class="flex overflow-x-auto space-x-4 scrollbar-hide w-auto">
                    <div class="flex" :style="'transform: translateX(-' + scrollIndex * 220 + 'px)'">
                        @foreach($kategori as $kat)
                        <a href="{{ route('kategori.show', $kat->id) }}"
                            class="min-w-max text-teal-700 hover:bg-teal-700 hover:text-white rounded py-2 px-4 transition-all duration-200 transform hover:scale-105">
                            {{ $kat->nama_kategori }}
                        </a>
                        @endforeach
                    </div>
                </div>

                <!-- Next Button (Right aligned) -->
                <div class="flex items-center space-x-4">
                    <button
                        @click="scrollIndex = Math.min(scrollIndex + itemsPerPage, Math.max(0, totalItems - itemsPerPage))"
                        :disabled="scrollIndex >= totalItems - itemsPerPage"
                        class="flex items-center px-4 py-2 bg-teal-700 text-white rounded-md hover:bg-teal-600 transition-all duration-200 disabled:bg-gray-300 disabled:cursor-not-allowed">
                        Next <i class="fas fa-chevron-right ml-2"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mx-auto flex flex-wrap py-6">
        <!-- Posts Section -->
        <section class="w-full md:w-2/3 flex flex-col items-center px-3">
            @foreach($berita as $item)
            <article
                class="flex flex-col bg-white rounded-lg shadow-lg overflow-hidden transition-transform my-4 duration-300 hover:shadow-xl">
                <!-- Featured Image -->
                <div class="relative h-48 overflow-hidden">
                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="Article featured image"
                        class="w-full h-full object-cover transition-transform duration-300 hover:scale-105">
                </div>

                <!-- Article Content -->
                <div class="flex flex-col flex-grow p-6 space-y-4">
                    <!-- Category -->
                    <div class="flex items-center">
                        <a
                            class="text-teal-600 text-sm font-bold uppercase tracking-wider hover:text-teal-500 transition-colors">
                            {{ $item->kategori->nama_kategori }}
                        </a>
                    </div>

                    <!-- Title -->
                    <h2 class="text-2xl font-bold leading-tight">
                        <a href="{{ route('berita.show', $item->id) }}"
                            class="text-gray-900 hover:text-gray-700 transition-colors">
                            {{ $item->judul }}
                        </a>
                    </h2>

                    <!-- Meta Information -->
                    <div class="text-sm text-gray-600">
                        Oleh <a class="font-semibold hover:text-gray-800 transition-colors">{{ $item->penulis }}</a>
                        <span class="mx-2">•</span>
                        <time
                            datetime="{{ $item->created_at->format('Y-m-d') }}">{{ $item->created_at->format('d M Y') }}</time>
                    </div>

                    <!-- Excerpt -->
                    <p class="text-gray-600 leading-relaxed">
                        {{ Str::limit(strip_tags($item->konten), 150) }}
                    </p>

                    <!-- Read More Link -->
                    <div class="pt-2">
                        <a href="{{ route('berita.show', $item->id) }}"
                            class="inline-flex items-center space-x-2 text-gray-800 font-extralight hover:text-teal-500 transition-colors">
                            <span>SELENGKAPNYA</span>
                            <i class="fas fa-arrow-right text-sm"></i>
                        </a>
                    </div>
                </div>
            </article>
            @endforeach

            <!-- Pagination -->
            <div class="w-full flex justify-center">
                {{ $berita->links('vendor.pagination.tailwind') }}
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

            <!-- Berita Terpopuler -->
            <div class="w-full bg-white shadow-lg rounded-lg flex flex-col my-4 p-6">
                <p class="text-xl font-bold pb-5">Berita Terpopuler</p>

                <div class="space-y-4">
                    @foreach($beritaTerpopuler as $item)
                    <div class="flex items-center space-x-4 border-b py-4">
                        <!-- Gambar -->
                        <img class="w-14 h-20 object-cover rounded-md" src="{{ asset('storage/' . $item->gambar) }}"
                            alt="{{ $item->judul }}">

                        <div class="flex-1">
                            <!-- Judul -->
                            <h3 class="text-lg font-semibold text-gray-800 hover:text-teal-500 transition-colors">
                                <a
                                    href="{{ route('berita.show', $item->id) }}">{{ Str::limit(strip_tags($item->judul), 20) }}</a>
                            </h3>

                            <!-- Excerpt -->
                            <p class="text-gray-600 text-justify">
                                {{ Str::limit(strip_tags($item->konten), 22) }}
                            </p>

                            <!-- Meta Information -->
                            <div class="text-sm text-gray-500 pt-2">
                                <span>Oleh <a href="#"
                                        class="font-medium text-gray-700 hover:text-gray-900 transition-colors">{{ $item->penulis }}</a></span>
                                <span class="mx-1">•</span>
                                <time
                                    datetime="{{ $item->created_at->format('Y-m-d') }}">{{ $item->created_at->format('d M Y') }}</time>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </aside>

    </div>
</section>

@include('components.to-top')

@endsection