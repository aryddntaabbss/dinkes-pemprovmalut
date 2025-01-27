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
                    Daftar Renstra
                </h2>

                <!-- Search Bar -->
                <div class="mb-6">
                    <input type="text" id="search" placeholder="Cari profil berdasarkan nama"
                        class="w-full py-2 px-4 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        oninput="filterProducts()">
                </div>

                <!-- List Renstra -->
                <div id="product-list">
                    @forelse ($renstra as $item)
                    <div class="flex items-center justify-between py-4 border-b border-gray-200">

                        <!-- Nama File -->
                        <span class="text-lg text-gray-900"><i class="fa-solid fa-file"></i> {{ $item->nama }}</span>

                        <!-- Link File -->
                        <a href="{{ Storage::url($item->file_path) }}" target="_blank"
                            class="text-blue-600 hover:text-blue-800 py-2 px-4 border rounded-md">
                            Unduh File
                        </a>
                    </div>
                    @empty
                    <div class="py-4 text-center text-gray-500">
                        Tidak ada file Renstra tersedia.
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function filterProducts() {
        const query = document.getElementById('search').value.toLowerCase();
        const products = document.querySelectorAll('#product-list > div');

        products.forEach(product => {
            const productName = product.querySelector('span').textContent.toLowerCase();
            if (productName.includes(query)) {
                product.style.display = 'flex';
            } else {
                product.style.display = 'none';
            }
        });
    }
</script>

@endsection