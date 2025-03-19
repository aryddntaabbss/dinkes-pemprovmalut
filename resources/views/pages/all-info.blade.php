@extends('layouts.main')

@section('body')

<section class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Daftar Informasi</h1>

    <!-- Grid Layout untuk Informasi -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach($informasi as $info)
        <div class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col md:flex-row">

            <!-- Gambar di Kiri dengan Border Pemisah -->
            <div class="w-full md:w-1/4 border-r border-gray-300">
                <img src="{{ asset('storage/' . $info->gambar) }}" alt="{{ $info->judul }}"
                    class="w-full h-full object-cover">
            </div>

            <!-- Konten di Kanan -->
            <div class="p-4 w-full md:w-2/3 flex flex-col justify-between">
                <div>
                    <h2 class="text-xl font-semibold text-gray-800">
                        <a href="{{ route('pages.info', $info->id) }}" class="hover:text-teal-500">
                            {{ $info->judul }}
                        </a>
                    </h2>
                    <p class="text-sm text-gray-500 mt-2">{{ $info->created_at->format('d M Y') }}</p>
                    <p class="mt-3 text-gray-700">{{ Str::limit(strip_tags($info->konten), 100, '...') }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $informasi->links() }}
    </div>
</section>

@endsection