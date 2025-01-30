@extends('layouts.main')

@section('body')
@include('components.hero')
@include('components.category-nav')

<section class="flex flex-col-reverse md:flex-row mb-5 mt-2">
    <!-- Posts Section -->
    <section class="w-full md:w-2/3 flex flex-col items-center px-3">
        @foreach($berita as $item)
        <article
            class="w-full flex flex-col bg-white rounded-lg shadow-lg overflow-hidden mb-5 transition-transform duration-300 hover:shadow-xl">
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
                    <a class="text-gray-900 hover:text-gray-700 transition-colors">
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
                    <a href="{{ route('pages.show', $item->id) }}"
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

    <!-- Sidebar Section (Sticky) -->
    <aside class="w-full md:w-1/3 flex flex-col items-center px-3 sticky top-0">
        @include('components.populer')
    </aside>
</section>

@endsection