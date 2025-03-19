@extends('layouts.main')

@section('body')
<section class="container mx-auto px-4 py-6">
    <div class="max-w-full mx-auto bg-white shadow-lg rounded-lg overflow-hidden">


        <!-- Gambar -->
        <div class="relative h-full overflow-hidden">
            <img src="{{ asset('storage/' . $informasi->gambar) }}" alt="{{ $informasi->ket_gambar }}"
                class="w-full h-full object-cover">
            <p class="text-sm px-2 py-1 font-medium text-teal-500"><span
                    class="mx-2">•</span>{{ $informasi->ket_gambar }}
            </p>
        </div>

        <!-- Konten -->
        <div class="p-6">
            <h1 class="text-3xl font-bold text-gray-800">{{ $informasi->judul }}</h1>

            <!-- Tanggal & Penulis -->
            <p class="text-sm text-gray-500 mt-2">
                {{ $informasi->created_at->format('d M Y') }}
            </p>

            <!-- Isi Informasi -->
            <div class="mt-4 text-gray-700">
                {!! htmlspecialchars_decode($informasi->konten) !!}
            </div>

            <!-- Tombol Kembali -->
            <div class="mt-6">
                <a href="{{ route('pages.allinfo') }}" class="text-teal-500 hover:text-teal-700">
                    &larr; Kembali ke Daftar Informasi
                </a>
            </div>
        </div>
    </div>
</section>
@endsection