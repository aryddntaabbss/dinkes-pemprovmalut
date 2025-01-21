<header class="inset-x-0 top-0 z-50 bg-teal-500">
    <nav class="flex items-center justify-between p-4 lg:px-8" aria-label="Global">
        <!-- Logo -->
        <div class="flex lg:flex-1">
            <a href="#" class="-m-1.5 p-1.5">
                <span class="sr-only">Your Company</span>
                <img class="h-10 w-auto" src="{{ asset('images/logo-dinkes.png') }}" alt="Logo">
            </a>
        </div>

        <!-- Mobile menu button -->
        <div class="flex lg:hidden">
            <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-white"
                id="open-menu">
                <span class="sr-only">Open main menu</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
        </div>

        <!-- Desktop Menu -->
        <div class="hidden lg:flex lg:gap-x-8">
            <a href="#" class="text-sm font-semibold text-white hover:text-gray-200">Beranda</a>

            <!-- Profil Menu -->
            <div class="relative group">
                <button class="text-sm font-semibold text-white flex items-center hover:text-gray-200">
                    Profil
                    <svg class="ml-2 h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <!-- Profil Content -->
                <div class="absolute left-0 hidden mt-2 w-56 p-3 bg-white shadow-lg rounded-md group-hover:block z-50">
                    <a href="#"
                        class="block px-4 py-2 text-sm rounded-md text-black hover:text-white  hover:bg-teal-500">Selayang
                        Pandang</a>
                    <a href="#"
                        class="block px-4 py-2 text-sm rounded-md text-black hover:text-white  hover:bg-teal-500">Visi
                        Misi</a>
                    <a href="#"
                        class="block px-4 py-2 text-sm rounded-md text-black hover:text-white  hover:bg-teal-500">Tugas
                        dan
                        Fungsi</a>
                    <a href="#"
                        class="block px-4 py-2 text-sm rounded-md text-black hover:text-white  hover:bg-teal-500">Struktur
                        Organisasi</a>
                    <a href="#"
                        class="block px-4 py-2 text-sm rounded-md text-black hover:text-white  hover:bg-teal-500">UPTD</a>
                    <a href="#"
                        class="block px-4 py-2 text-sm rounded-md text-black hover:text-white  hover:bg-teal-500">Profil
                        Pejabat</a>
                </div>
            </div>

            <!-- Informasi Menu -->
            <div class="relative group">
                <button class="text-sm font-semibold text-white flex items-center hover:text-gray-200">
                    Informasi
                    <svg class="ml-2 h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <!-- Informasi Content -->
                <div class="absolute left-0 hidden mt-2 w-56 p-3 bg-white shadow-lg rounded-md group-hover:block z-50">
                    <a href="#"
                        class="block px-4 py-2 text-sm rounded-md text-black hover:text-white hover:bg-teal-500">Berita
                        dan Informasi</a>
                    <a href="#"
                        class="block px-4 py-2 text-sm rounded-md text-black hover:text-white hover:bg-teal-500">Tips
                        Kesehatan</a>

                    <!-- Data Kesehatan dengan Nested Dropdown -->
                    <div class="relative group/nested">
                        <a href="#"
                            class="px-4 py-2 text-sm rounded-md text-black hover:text-white hover:bg-teal-500 flex justify-between items-center">
                            Data Kesehatan
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                        <!-- Nested Dropdown untuk Data Kesehatan -->
                        <div
                            class="absolute left-full top-0 hidden w-48 p-3 bg-white shadow-lg rounded-md group-hover/nested:block -mt-2 ml-2">
                            <a href="#"
                                class="block px-4 py-2 text-sm rounded-md text-black hover:text-white hover:bg-teal-500">Sekretariat</a>
                            <a href="#"
                                class="block px-4 py-2 text-sm rounded-md text-black hover:text-white hover:bg-teal-500">Bidang
                                Kesmas</a>
                            <a href="#"
                                class="block px-4 py-2 text-sm rounded-md text-black hover:text-white hover:bg-teal-500">Bidang
                                P2</a>
                            <a href="#"
                                class="block px-4 py-2 text-sm rounded-md text-black hover:text-white hover:bg-teal-500">Bidang
                                Yankes</a>
                            <a href="#"
                                class="block px-4 py-2 text-sm rounded-md text-black hover:text-white hover:bg-teal-500">Bidang
                                SDK</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ragam Menu -->
            <div class="relative group">
                <button class="text-sm font-semibold text-white flex items-center hover:text-gray-200">
                    Ragam
                    <svg class="ml-2 h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <!-- Ragam Content -->
                <div class="absolute left-0 hidden mt-2 w-56 p-3 bg-white shadow-lg rounded-md group-hover:block z-50">
                    <a href="#"
                        class="block px-4 py-2 text-sm rounded-md text-black hover:text-white  hover:bg-teal-500">Foto</a>
                    <a href="#"
                        class="block px-4 py-2 text-sm rounded-md text-black hover:text-white  hover:bg-teal-500">Vidio</a>
                    <a href="#"
                        class="block px-4 py-2 text-sm rounded-md text-black hover:text-white  hover:bg-teal-500">Forum
                        Konsultasi</a>
                </div>
            </div>

            <!-- Unduh Menu -->
            <div class="relative group">
                <button class="text-sm font-semibold text-white flex items-center hover:text-gray-200">
                    Unduh
                    <svg class="ml-2 h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <!-- Unduh Content -->
                <div class="absolute right-0 hidden mt-2 w-56 p-3 bg-white shadow-lg rounded-md group-hover:block z-50">
                    <a href="#"
                        class="block px-4 py-2 text-sm rounded-md text-black hover:text-white  hover:bg-teal-500">Produk
                        Kesehatan</a>
                    <a href="#"
                        class="block px-4 py-2 text-sm rounded-md text-black hover:text-white  hover:bg-teal-500">Tips
                        Kesehatan</a>
                    <a href="#"
                        class="block px-4 py-2 text-sm rounded-md text-black hover:text-white  hover:bg-teal-500">Restra</a>
                    <a href="#"
                        class="block px-4 py-2 text-sm rounded-md text-black hover:text-white  hover:bg-teal-500">Lakip</a>
                    <a href="#"
                        class="block px-4 py-2 text-sm rounded-md text-black hover:text-white  hover:bg-teal-500">Dokumen
                        Lainnya</a>
                </div>
            </div>

            <a href="#" class="text-sm font-semibold text-white hover:text-gray-200">Kontak Kami</a>
        </div>
    </nav>

    <!-- Mobile menu -->
    <div class="lg:hidden hidden" id="mobile-menu" role="dialog" aria-modal="true">
        <!-- Background backdrop -->
        <div class="fixed inset-0 bg-gray-800 bg-opacity-50" onclick="closeMenu()"></div>
        <div class="fixed inset-y-0 z-50 w-full overflow-y-auto bg-white sm:ring-1 sm:ring-gray-900/10">
            <div class="flex items-center justify-between px-6 py-6 bg-teal-500">
                <a href="#" class="-m-1.5 p-1.5">
                    <img class="h-10 w-auto" src="{{ asset('images/logo-dinkes.png') }}" alt="Logo">
                </a>
                <button type="button" class="-m-2.5 rounded-md p-2.5 text-white" id="close-menu" onclick="closeMenu()">
                    <span class="sr-only">Close menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="mt-6 flow-root bg-white px-6">
                <div class="-my-6 divide-y divide-gray-500/10">
                    <div class="space-y-2 py-6">
                        <a href="#"
                            class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold text-black hover:bg-teal-500">Beranda</a>

                        <!-- Profil Menu -->
                        <div class="relative group">
                            <a
                                class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold text-black hover:bg-teal-500">
                                Profil
                            </a>
                            <!-- Profil Content -->
                            <div
                                class="absolute left-0 hidden mt-2 p-3 w-full bg-white shadow-lg rounded-md group-hover:block z-50">
                                <a href="#"
                                    class="block px-4 py-2 text-sm rounded-lg text-black hover:bg-teal-500">Selayang
                                    Pandang</a>
                                <a href="#" class="block px-4 py-2 text-sm rounded-lg text-black hover:bg-teal-500">Visi
                                    Misi</a>
                                <a href="#"
                                    class="block px-4 py-2 text-sm rounded-lg text-black hover:bg-teal-500">Tugas dan
                                    Fungsi</a>
                                <a href="#"
                                    class="block px-4 py-2 text-sm rounded-lg text-black hover:bg-teal-500">Struktur
                                    Organisasi</a>
                                <a href="#"
                                    class="block px-4 py-2 text-sm rounded-lg text-black hover:bg-teal-500">UPTD</a>
                                <a href="#"
                                    class="block px-4 py-2 text-sm rounded-lg text-black hover:bg-teal-500">Profil
                                    Pejabat</a>
                            </div>
                        </div>

                        <!-- Informasi Menu -->
                        <div class="relative group">
                            <a
                                class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold text-black hover:bg-teal-500">
                                Informasi
                            </a>
                            <!-- Informasi Content -->
                            <div class="hidden mt-2 bg-gray-50 rounded-lg p-2 group-hover:block">
                                <a href="#" class="block px-4 py-2 text-sm rounded-lg text-black hover:bg-teal-500">
                                    Berita dan Informasi
                                </a>
                                <a href="#" class="block px-4 py-2 text-sm rounded-lg text-black hover:bg-teal-500">
                                    Tips Kesehatan
                                </a>
                                <!-- Data Kesehatan Dropdown -->
                                <div class="relative">
                                    <button onclick="toggleDataKesehatan()"
                                        class="w-full flex justify-between items-center px-4 py-2 text-sm rounded-lg text-black hover:bg-teal-500">
                                        Data Kesehatan
                                        <svg class="w-4 h-4 transition-transform" id="dataKesehatanIcon" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>
                                    <div id="dataKesehatanDropdown" class="hidden pl-4 mt-1">
                                        <a href="#"
                                            class="block px-4 py-2 text-sm rounded-lg text-black hover:bg-teal-500">Sekretariat</a>
                                        <a href="#"
                                            class="block px-4 py-2 text-sm rounded-lg text-black hover:bg-teal-500">Bidang
                                            Kesmas</a>
                                        <a href="#"
                                            class="block px-4 py-2 text-sm rounded-lg text-black hover:bg-teal-500">Bidang
                                            P2</a>
                                        <a href="#"
                                            class="block px-4 py-2 text-sm rounded-lg text-black hover:bg-teal-500">Bidang
                                            Yankes</a>
                                        <a href="#"
                                            class="block px-4 py-2 text-sm rounded-lg text-black hover:bg-teal-500">Bidang
                                            SDK</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Ragam Menu -->
                        <div class="relative group">
                            <a
                                class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold text-black hover:bg-teal-500">
                                Ragam
                            </a>
                            <!-- Ragam Content -->
                            <div
                                class="absolute left-0 hidden mt-2 p-3 w-full bg-white shadow-lg rounded-md group-hover:block z-50">
                                <a href="#"
                                    class="block px-4 py-2 text-sm rounded-lg text-black hover:bg-teal-500">Foto</a>
                                <a href="#"
                                    class="block px-4 py-2 text-sm rounded-lg text-black hover:bg-teal-500">Vidio</a>
                                <a href="#"
                                    class="block px-4 py-2 text-sm rounded-lg text-black hover:bg-teal-500">Forum
                                    Konsultasi</a>
                            </div>
                        </div>

                        <!-- Unduh Menu -->
                        <div class="relative group">
                            <a
                                class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold text-black hover:bg-teal-500">
                                Unduh
                            </a>
                            <!-- Unduh Content -->
                            <div
                                class="absolute left-0 hidden mt-2 p-3 w-full bg-white shadow-lg rounded-md group-hover:block z-50">
                                <a href="#"
                                    class="block px-4 py-2 text-sm rounded-lg text-black hover:bg-teal-500">Produk
                                    Kesehatan</a>
                                <a href="#" class="block px-4 py-2 text-sm rounded-lg text-black hover:bg-teal-500">Tips
                                    Kesehatan</a>
                                <a href="#"
                                    class="block px-4 py-2 text-sm rounded-lg text-black hover:bg-teal-500">Restra</a>
                                <a href="#"
                                    class="block px-4 py-2 text-sm rounded-lg text-black hover:bg-teal-500">Lakip</a>
                                <a href="#"
                                    class="block px-4 py-2 text-sm rounded-lg text-black hover:bg-teal-500">Dokumen
                                    Lainnya</a>
                            </div>
                        </div>

                        <a href="#"
                            class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold text-black hover:bg-teal-500">Kontak
                            Kami</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<script>
    // Script to toggle the mobile menu
    const mobileMenu = document.getElementById('mobile-menu');
    const openMenuButton = document.getElementById('open-menu');
    const closeMenuButton = document.getElementById('close-menu');

    openMenuButton.addEventListener('click', () => {
        mobileMenu.classList.remove('hidden');
    });

    closeMenuButton.addEventListener('click', () => {
        mobileMenu.classList.add('hidden');
    });

// Script untuk toggle Data Kesehatan
    function toggleDataKesehatan() {
    const dropdown = document.getElementById('dataKesehatanDropdown');
    const icon = document.getElementById('dataKesehatanIcon');
    
    dropdown.classList.toggle('hidden');
    icon.style.transform = dropdown.classList.contains('hidden') ? 'rotate(0deg)' : 'rotate(180deg)';
}
</script>