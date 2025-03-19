@extends('layouts.main')

@section('body')

<section class="m-4 px-5">
    <div class="w-full max-w-7xl mx-auto">
        <!-- Konten Halaman -->
        <div class="flex flex-col md:flex-row justify-center space-x-0 md:space-x-6 space-y-6 md:space-y-0">
            <!-- Card Kontak -->
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
                <div class="flex items-center space-x-3 mb-6">
                    <i class="fas fa-phone-alt text-xl text-teal-500"></i>
                    <p class="text-lg text-gray-700">(0921) XXXXX</p>
                </div>

                <!-- Formulir Kontak -->
                <h3 class="text-2xl font-semibold text-gray-800 mb-4">Kirim Pesan</h3>
                @if(session('success'))
                <div class="bg-green-200 text-green-800 p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
                @endif

                <form action="" method="POST">
                    @csrf

                    <!-- Nama -->
                    <div class="mb-4">
                        <label class="block font-medium text-gray-700">Nama</label>
                        <input type="text" name="name"
                            class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-teal-500" required>
                    </div>

                    <!-- Alamat -->
                    <div class="mb-4">
                        <label class="block font-medium text-gray-700">Alamat</label>
                        <input type="text" name="name"
                            class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-teal-500" required>
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label class="block font-medium text-gray-700">Email</label>
                        <input type="email" name="email"
                            class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-teal-500" required>
                    </div>

                    <!-- Subjek -->
                    <div class="mb-4">
                        <label class="block font-medium text-gray-700">Subjek</label>
                        <input type="text" name="text"
                            class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-teal-500" required>
                    </div>

                    <!-- Pesan -->
                    <div class="mb-4">
                        <label class="block font-medium text-gray-700">Pesan</label>
                        <textarea name="message" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-teal-500"
                            rows="4" required></textarea>
                    </div>

                    <button type="submit"
                        class="w-full bg-teal-500 text-white p-3 rounded-lg hover:bg-teal-600 transition">
                        Kirim Pesan
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection