<!-- Footer -->
<footer class="bg-white">
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Informasi Kontak -->
            <div class="text-dark">
                <!-- Logo -->
                <a href="/" class="shrink-0 flex items-center space-x-2 mb-3">
                    <img class="h-14 w-auto" src="{{ asset('images/logo.png') }}" alt="Logo">
                    <h2 class="text-xl w-52 font-extrabold text-dark">Dinas Kesehatan Provinsi Maluku Utara</h2>
                </a>
                <div class="space-y-2">
                    <p class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Alamat : Jl. Raya Sultan Nuku, Sofifi
                    </p>

                    <p class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        Email : dinkes@malutprov.go.id
                    </p>

                    <p class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        Telp : (0921) XXXXX
                    </p>
                </div>
            </div>

            <!-- Peta -->
            <div class="w-full h-full relative overflow-hidden rounded-lg">
                <div id="map-footer" class="w-full h-64 border rounded-lg shadow-md"></div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="border-t border-teal-700 mt-8 pt-4 text-center text-dark">
            Copyright ©2025 Dinas Kesehatan Prov. Maluku Utara
        </div>
    </div>
</footer>

<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var map = L.map('map-footer').setView([0.735016, 127.568350], 15);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker([0.735016, 127.568350]).addTo(map)
            .bindPopup("<b>Kantor Dinas Kesehatan Provinsi Maluku Utara</b><br>Jl. Raya Sultan Nuku, Sofifi")
            .openPopup();
    });
</script>