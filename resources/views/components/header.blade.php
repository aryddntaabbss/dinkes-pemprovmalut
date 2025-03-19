<header class="inset-x-0 top-0 z-50 bg-teal-500">
    <nav class="flex items-center justify-between p-4 lg:px-8" aria-label="Global">
        <!-- Logo -->
        <div class="flex lg:flex-1">
            <a href="/" class="-m-1.5 p-1.5">
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
            <a href="/" class="text-sm font-semibold text-white hover:text-gray-200">Beranda</a>

            <!-- Profil Menu -->
            <div class="relative dropdown">
                <button class="text-sm font-semibold text-white flex items-center hover:text-gray-200">
                    Profil
                    <svg class="ml-2 h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div class="dropdown-menu absolute left-0 mt-2 w-56 p-3 bg-white shadow-lg rounded-md hidden z-50">
                    @if(isset($profilMenus) && $profilMenus->count() > 0)
                    @foreach($profilMenus as $menu)
                    <a href="{{ url('/profil/'.$menu->slug) }}"
                        class="block px-4 py-2 text-sm rounded-md text-black hover:text-white hover:bg-teal-500">{{ $menu->name }}</a>
                    @endforeach
                    <a href="/profil-pejabat"
                        class="block px-4 py-2 text-sm rounded-md text-black hover:text-white hover:bg-teal-500">Profil
                        Pejabat</a>
                    <a href="/struktur-organisasi"
                        class="block px-4 py-2 text-sm rounded-md text-black hover:text-white hover:bg-teal-500">Struktur
                        Organisasi</a>
                    @else
                    <p>No menu available</p>
                    @endif
                </div>
            </div>

            <!-- Informasi Menu -->
            <div class="relative dropdown">
                <button class="text-sm font-semibold text-white flex items-center hover:text-gray-200">
                    Informasi
                    <svg class="ml-2 h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div class="dropdown-menu absolute left-0 mt-2 w-56 p-3 bg-white shadow-lg rounded-md hidden z-50">
                    <a href="/all-informasi"
                        class="block px-4 py-2 text-sm rounded-md text-black hover:text-white hover:bg-teal-500">Informasi</a>

                    @if(isset($informasilMenus) && $informasilMenus->count() > 0)

                    <!-- Data Kesehatan Dropdown -->
                    <div class="relative dropdown">
                        <button
                            class="flex justify-between w-full px-4 py-2 text-sm rounded-md text-black hover:text-white hover:bg-teal-500">
                            Data Kesehatan
                            <svg class="ml-2 h-4 w-4" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div class="dropdown-menu absolute mt-4 w-full p-2 bg-white shadow-lg rounded-md hidden z-50">
                            @foreach($dakesMenus as $menu)
                            <a href="{{ url('/data-kesehatan/'.$menu->slug) }}"
                                class="block px-4 py-2 text-sm rounded-md text-black hover:text-white hover:bg-teal-500">
                                {{ $menu->name }}
                            </a>
                            @endforeach
                        </div>
                    </div>

                    @else
                    <p class="text-center text-gray-600">No menu available</p>
                    @endif
                </div>
            </div>

            <!-- Ragam Menu -->
            <div class="relative dropdown">
                <button class="text-sm font-semibold text-white flex items-center hover:text-gray-200">
                    Ragam
                    <svg class="ml-2 h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div class="dropdown-menu absolute left-0 hidden mt-2 w-56 p-3 bg-white shadow-lg rounded-md z-50">
                    <a href="/ragam/foto"
                        class="block px-4 py-2 text-sm rounded-md text-black hover:text-white hover:bg-teal-500">Foto</a>
                    <a href="/ragam/video"
                        class="block px-4 py-2 text-sm rounded-md text-black hover:text-white hover:bg-teal-500">Vidio</a>
                    <a href="/"
                        class="block px-4 py-2 text-sm rounded-md text-black hover:text-white hover:bg-teal-500">Forum
                        Konsultasi</a>
                </div>
            </div>

            <!-- Unduh Menu -->
            <div class="relative dropdown">
                <button class="text-sm font-semibold text-white flex items-center hover:text-gray-200">
                    Unduh
                    <svg class="ml-2 h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div class="dropdown-menu absolute right-0 hidden mt-2 w-56 p-3 bg-white shadow-lg rounded-md z-50">
                    <a href="/unduhan/prod-kesehatan"
                        class="block px-4 py-2 text-sm rounded-md text-black hover:text-white hover:bg-teal-500">Produk
                        Kesehatan</a>
                    <a href="/unduhan/prof-kesehatan"
                        class="block px-4 py-2 text-sm rounded-md text-black hover:text-white hover:bg-teal-500">Tips
                        Kesehatan</a>
                    <a href="/unduhan/renstra"
                        class="block px-4 py-2 text-sm rounded-md text-black hover:text-white hover:bg-teal-500">Renstra</a>
                    <a href="/unduhan/lakip"
                        class="block px-4 py-2 text-sm rounded-md text-black hover:text-white hover:bg-teal-500">Lakip</a>
                    <a href="/unduhan/doc-lainx"
                        class="block px-4 py-2 text-sm rounded-md text-black hover:text-white hover:bg-teal-500">Dokumen
                        Lainnya</a>
                </div>
            </div>

            <a href="/kontak" class="text-sm font-semibold text-white hover:text-gray-200">Kontak Kami</a>
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
                        <a href="/"
                            class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold text-black hover:bg-teal-500">Beranda</a>

                        <!-- Profil Menu -->
                        <div class="relative group">
                            <a
                                class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold text-black hover:bg-teal-500">Profil</a>
                            <div
                                class="absolute left-0 hidden mt-2 p-3 w-full bg-white shadow-lg rounded-md group-hover:block z-50">
                                @if(isset($profilMenus) && $profilMenus->count() > 0)
                                @foreach($profilMenus as $menu)
                                <a href="{{ url('/profil/'.$menu->slug) }}"
                                    class="block px-4 py-2 text-sm rounded-lg text-black hover:bg-teal-500">{{ $menu->name }}</a>
                                @endforeach
                                @else
                                <p>No menu available</p>
                                @endif
                            </div>
                        </div>

                        <!-- Informasi Menu -->
                        <div class="relative group">
                            <a
                                class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold text-black hover:bg-teal-500">Informasi</a>
                            <div class="hidden mt-2 bg-gray-100 shadow-lg rounded-md group-hover:block z-50">
                                @if(isset($informasilMenus) && $informasilMenus->count() > 0)
                                @foreach($informasilMenus as $menu)
                                <a href="{{ url('/informasi/'.$menu->slug) }}"
                                    class="block px-4 py-2 text-base rounded-md text-black hover:bg-teal-500">{{ $menu->name }}</a>
                                @endforeach


                                <!-- Data Kesehatan -->
                                @foreach($dakesMenus as $menu)
                                <a href="{{ url('/data-kesehatan/'.$menu->slug) }}"
                                    class="block px-4 py-2 text-base rounded-md text-black hover:bg-teal-500">
                                    {{ $menu->name }}
                                </a>
                                @endforeach
                                @else
                                <p class="text-center text-gray-600">No menu available</p>
                                @endif
                            </div>
                        </div>

                        <!-- Ragam Menu -->
                        <div class="relative group">
                            <a
                                class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold text-black hover:bg-teal-500">Ragam</a>
                            <div
                                class="absolute left-0 hidden mt-2 w-full bg-white shadow-lg rounded-md group-hover:block z-50">
                                <a href="/ragam/foto"
                                    class="block px-4 py-2 text-sm rounded-md text-black hover:text-white hover:bg-teal-500">Foto</a>
                                <a href="/ragam/video"
                                    class="block px-4 py-2 text-sm rounded-md text-black hover:text-white hover:bg-teal-500">Vidio</a>
                                <a href="/"
                                    class="block px-4 py-2 text-sm rounded-md text-black hover:text-white hover:bg-teal-500">Forum
                                    Konsultasi</a>
                            </div>
                        </div>

                        <!-- Unduh Menu -->
                        <div class="relative group">
                            <a
                                class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold text-black hover:bg-teal-500">Unduh</a>
                            <div class="hidden mt-2 p-3 w-full bg-white shadow-lg rounded-md group-hover:block z-50">
                                <a href="/unduhan/prod-kesehatan"
                                    class="block px-4 py-2 text-sm rounded-md text-black hover:text-white hover:bg-teal-500">Produk
                                    Kesehatan</a>
                                <a href="/unduhan/prof-kesehatan"
                                    class="block px-4 py-2 text-sm rounded-md text-black hover:text-white hover:bg-teal-500">Tips
                                    Kesehatan</a>
                                <a href="/unduhan/renstra"
                                    class="block px-4 py-2 text-sm rounded-md text-black hover:text-white hover:bg-teal-500">Renstra</a>
                                <a href="/unduhan/lakip"
                                    class="block px-4 py-2 text-sm rounded-md text-black hover:text-white hover:bg-teal-500">Lakip</a>
                                <a href="/unduhan/doc-lainx"
                                    class="block px-4 py-2 text-sm rounded-md text-black hover:text-white hover:bg-teal-500">Dokumen
                                    Lainnya</a>
                            </div>
                        </div>

                        <a href="/kontak"
                            class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold text-black hover:bg-teal-500">Kontak
                            Kami</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<script>
    document.querySelectorAll('.dropdown').forEach(function(dropdown) {
    const button = dropdown.querySelector('button');
    const menu = dropdown.querySelector('.dropdown-menu');
    
    button.addEventListener('click', function() {
    // Toggle the visibility of the dropdown menu
    menu.classList.toggle('hidden');
    });
    
    // Close dropdown if clicked outside
    document.addEventListener('click', function(event) {
    if (!dropdown.contains(event.target)) {
    menu.classList.add('hidden');
    }
    });
    });

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
</script>