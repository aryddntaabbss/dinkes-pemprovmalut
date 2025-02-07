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
                    Profil Pejabat
                </h2>

                <!-- Jabatan -->
                <div class="mb-6">
                    <ul class="flex flex-wrap gap-3">
                        @foreach ($pejabat as $item)
                        <li>
                            <a href="{{ route('pages.pejabat', ['jabatan' => $item->jabatan]) }}" class="px-4 py-2 text-sm font-medium text-gray-800 rounded-md 
                                {{ request('jabatan') === $item->jabatan ? 'bg-gray-200' : 'hover:bg-gray-100' }}">
                                {{ ucfirst($item->jabatan) }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Konten dengan gambar di kiri dan detail di kanan -->
                <div class="flex flex-col md:flex-row items-center md:items-start space-y-4 md:space-y-0 md:space-x-6">
                    @if ($pejabatTerpilih)
                    <!-- Gambar -->
                    <div class="flex-shrink-0">
                        <img src="{{ asset('storage/' . $pejabatTerpilih->foto) }}"
                            alt="Foto {{ $pejabatTerpilih->nama_pejabat }}"
                            class="w-48 h-60 max-w-xs md:max-w-sm rounded-lg shadow-lg object-cover">
                    </div>

                    <!-- Detail Pejabat -->
                    <div class="flex flex-col text-left md:text-start">
                        <h2 class="text-2xl font-bold text-gray-900">{{ $pejabatTerpilih->jabatan }}</h2>
                        <p class="text-gray-700 text-lg font-semibold">{{ $pejabatTerpilih->nama_pejabat }}</p>
                        <p class="text-gray-600 text-sm">Pangkat/Golongan:
                            {{ $pejabatTerpilih->pangkat_golongan ?? '-' }}
                        </p>
                        <p class="text-gray-600 text-sm">NIP: {{ $pejabatTerpilih->nip ?? '-' }}</p>
                        <p class="text-gray-600 text-sm">Pendidikan: {{ $pejabatTerpilih->pendidikan ?? '-' }}</p>
                    </div>
                    @else
                    <div class="w-full text-center text-gray-600">
                        <p>Data pejabat belum tersedia.</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

@endsection