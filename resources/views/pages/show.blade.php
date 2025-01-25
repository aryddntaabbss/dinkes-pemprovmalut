@extends('layouts.main')

@section('body')
<div class="container mx-auto px-6 py-12">
    <article class="bg-white rounded-lg shadow-lg overflow-hidden">
        <!-- Featured Image -->
        <div class="relative h-48 overflow-hidden">
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
@endsection