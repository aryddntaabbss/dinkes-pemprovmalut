@extends('layouts.main')

@section('body')
<section class="m-4 px-5">
    <div class="w-full max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row justify-between space-y-6 md:space-y-0 md:space-x-6">
            <div class="w-full md:w-1/2 bg-white border rounded-lg py-8 px-10 text-justify shadow-xl"
                data-aos="fade-up">
                <h2 class="text-4xl font-bold text-gray-800 text-start pb-5">Kontak Page</h2>

                <!-- Alamat -->
                <div class="flex items-center space-x-3 mb-4">
                    <i class="fas fa-map-marker-alt text-xl text-teal-500"></i>
                    <p class="text-lg text-gray-700">Jl. Raya Sultan Nuku, Sofifi</p>
                </div>

                <!-- Peta -->
                <div id="map" class="w-full h-64 border rounded-lg shadow-md"></div>
            </div>

            <div class="w-full md:w-1/2 bg-white border rounded-lg py-8 px-10 shadow-xl">
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
                            class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-teal-500" required>
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label class="block font-medium text-gray-700">Email</label>
                        <input type="email" name="email"
                            class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-teal-500" required>
                    </div>

                    <!-- Pesan -->
                    <div class="mb-4">
                        <label class="block font-medium text-gray-700">Pesan</label>
                        <textarea name="message" class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-teal-500"
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

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var map = L.map('map').setView([0.735016, 127.568350], 15);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'        }).addTo(map);

        L.marker([0.735016, 127.568350]).addTo(map)
            .bindPopup("<b>Kantor Dinas Kesehatan Provinsi Maluku Utara</b><br>Jl. Raya Sultan Nuku, Sofifi")
            .openPopup();
    });
</script>

@endsection