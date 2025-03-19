@extends('layouts.main')

@section('body')

<section class="m-4 px-5">
    <div class="w-full max-w-7xl mx-auto">
        <!-- Gambar -->
        <div class="flex flex-col md:flex-row justify-center space-x-0 md:space-x-6 space-y-6 md:space-y-0">
            <!-- Card Paket -->
            <div class="w-full bg-white border rounded-lg py-8 px-10 text-justify shadow-xl" data-aos="fade-up">
                <h2 class="text-4xl font-bold text-gray-800 text-start pb-5" data-aos="fade-up"
                    data-aos-duration="1500">
                    Galeri Foto
                </h2>

                <!-- Kategori -->
                <div class="mb-4">
                    <ul class="flex flex-wrap space-x-4">
                        <!-- Tampilkan kategori -->
                        <li>
                            <a href="{{ route('pages.ragam.foto', ['category' => 'all']) }}"
                                class="px-4 py-2 text-sm font-medium text-gray-800 rounded-md 
                                {{ request('category') === 'all' || !request('category') ? 'bg-gray-200' : 'hover:bg-gray-100' }}">
                                All
                            </a>
                        </li>
                        @foreach ($categories as $category)
                        <li>
                            <a href="{{ route('pages.ragam.foto', ['category' => $category]) }}" class="px-4 py-2 text-sm font-medium text-gray-800 rounded-md 
                                {{ request('category') === $category ? 'bg-gray-200' : 'hover:bg-gray-100' }}">
                                {{ ucfirst($category) }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Galeri Foto -->
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @forelse ($images as $image)
                    <div class="relative group">
                        <img src="{{ asset('storage/' . $image->image_path) }}" alt="Gambar"
                            class="rounded-lg shadow-lg w-full h-48 object-cover transition-transform duration-300 transform group-hover:scale-105">

                        <!-- Kategori -->
                        <div
                            class="absolute bottom-8 left-1 bg-gray-800 text-white text-xs px-2 py-1 rounded-md opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            {{ ucfirst($image->category) }}
                        </div>
                        <p class="text-sm py-1 font-medium text-blue-500"><span
                                class="mr-2">•</span>{{ $image->ket_gambar }}
                        </p>
                    </div>
                    @empty
                    <p class="text-center col-span-full text-gray-500">Tidak ada gambar untuk kategori ini.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>

@endsection