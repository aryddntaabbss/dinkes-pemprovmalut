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
                    Kontak Page
                </h2>

                <!-- Alamat -->
                <div class="flex items-center space-x-3 mb-4">
                    <i class="fas fa-map-marker-alt text-xl text-teal-500"></i>
                    <p class="text-lg text-gray-700">Jl. Raya Lintas Halmahera Gosale Puncak, Sofifi</p>
                </div>

                <!-- Email -->
                <div class="flex items-center space-x-3 mb-4">
                    <i class="fas fa-envelope text-xl text-teal-500"></i>
                    <p class="text-lg text-gray-700">dinkes@malutprov.go.id</p>
                </div>

                <!-- Telepon -->
                <div class="flex items-center space-x-3 mb-4">
                    <i class="fas fa-phone-alt text-xl text-teal-500"></i>
                    <p class="text-lg text-gray-700">(0921) XXXXX</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection