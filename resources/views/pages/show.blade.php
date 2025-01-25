@extends('layouts.main')

@section('body')
<section class="flex flex-col-reverse md:flex-row mb-5 mt-4">
    <!-- Main Content Section -->
    <div class="w-full md:w-2/3 flex flex-col items-center px-3">
        <article class="w-full bg-white rounded-lg shadow-lg overflow-hidden">
            <!-- Featured Image -->
            <div class="relative h-96 overflow-hidden">
                <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Article featured image"
                    class="w-full h-full object-cover">
            </div>

            <!-- Article Content -->
            <div class="p-6">
                <h1 class="text-3xl font-bold text-gray-800">{{ $berita->judul }}</h1>

                <!-- Optional: Display Published Date -->
                <p class="text-sm text-gray-500 mt-2">{{ $berita->penulis }}<span
                        class="mx-2">•</span>{{ $berita->created_at->format('d M Y') }}</p>

                <!-- Article Body -->
                <div class="mt-4 text-gray-700">
                    {{ strip_tags($berita->konten) }}
                </div>
            </div>
        </article>

        <!-- Back Button -->
        <div class="mt-6">
            <a href="{{ route('pages.index') }}" class="text-teal-500 hover:text-teal-700">
                &larr; Kembali ke Berita
            </a>
        </div>
    </div>

    <!-- Sidebar Section (Popular Articles) -->
    <aside class="w-full md:w-1/3 flex flex-col items-center px-3 sticky top-0">
        @include('components.populer')
    </aside>
</section>
@endsection