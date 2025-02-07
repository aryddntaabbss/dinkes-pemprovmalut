@extends('layouts.main')

@section('body')

<section class="m-4 px-5">
    <div class="w-full max-w-7xl mx-auto">
        <!-- Konten Halaman -->
        <div class="flex flex-col md:flex-row justify-center space-x-0 md:space-x-6 space-y-6 md:space-y-0">
            <!-- Card Paket -->
            <div class="w-full bg-white border rounded-lg py-8 px-10 text-justify shadow-xl" data-aos="fade-up">
                <h2 class="text-4xl font-bold text-gray-800 text-start pb-5" data-aos="fade-up"
                    data-aos-duration="1500">
                    Struktur Organisasi
                </h2>

                <!-- Cek apakah ada gambar -->
                @if ($struktur && $struktur->image)
                <div class="flex justify-center">
                    <img src="{{ asset('storage/' . $struktur->image) }}" alt="Struktur Organisasi"
                        class="max-w-full h-auto rounded-lg shadow-lg">
                </div>
                @else
                <p class="text-gray-500">Struktur organisasi belum tersedia.</p>
                @endif
            </div>
        </div>
    </div>
</section>

@endsection