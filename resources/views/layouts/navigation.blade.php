<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo and Navigation Links -->
            <div class="flex items-center">
                <!-- Logo -->
                <a href="{{ route('index') }}" class="shrink-0 flex items-center space-x-2 px-5">
                    <img class="h-10 w-auto" src="{{ asset('images/logo.png') }}" alt="Logo">
                    <h2 class="text-sm w-48 font-semibold text-gray-800">Dinas Kesehatan Provinsi Maluku Utara</h2>
                </a>

                <!-- Navigation Links -->
                <div class="hidden sm:flex sm:space-x-2">
                    <x-nav-link :href="route('index')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    {{--
                    <x-nav-link :href="route('profil.index')">
                        {{ __('Profil') }}
                    </x-nav-link> --}}

                    <!-- Dropdown: Kelola Profil -->
                    <x-dropdown align="center" width="44">
                        <x-slot name="trigger">
                            <button
                                class="flex items-center px-4 py-2 text-sm font-medium text-gray-500 hover:text-gray-700">
                                {{ __('Kelola Profil') }}
                                <svg class="ml-2 w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('profil.index')" :active="request()->routeIs('profil.index')">
                                {{ __('Menu Profil') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('profil-pejabat.index')"
                                :active="request()->routeIs('profil-pejabat.index')">
                                {{ __('Profil Pejabat') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('struktur.index')"
                                :active="request()->routeIs('struktur.index')">
                                {{ __('Struktur Organisasi') }}
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>

                    <!-- Dropdown: Kelola Artikel -->
                    <x-dropdown align="center" width="44">
                        <x-slot name="trigger">
                            <button
                                class="flex items-center px-4 py-2 text-sm font-medium text-gray-500 hover:text-gray-700">
                                {{ __('Kelola Artikel') }}
                                <svg class="ml-2 w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('berita.index')" :active="request()->routeIs('berita.index')">
                                {{ __('Berita') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('kategori.index')"
                                :active="request()->routeIs('kategori.index')">
                                {{ __('Kategori') }}
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>

                    <!-- Dropdown: Kelola Informasi -->
                    <x-dropdown align="center" width="44">
                        <x-slot name="trigger">
                            <button
                                class="flex items-center px-4 py-2 text-sm font-medium text-gray-500 hover:text-gray-700 ">
                                {{ __('Kelola Informasi') }}
                                <svg class="ml-2 w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('informasi.index')"
                                :active="request()->routeIs('informasi.index')">
                                {{ __('Informasi') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('data-kesehatan.index')"
                                :active="request()->routeIs('data-kesehatan.index')">
                                {{ __('Data Kesehatan') }}
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>

                    <!-- Dropdown: Kelola Ragam -->
                    <x-dropdown align="center" width="44">
                        <x-slot name="trigger">
                            <button
                                class="flex items-center px-4 py-2 text-sm font-medium text-gray-500 hover:text-gray-700 ">
                                {{ __('Kelola Ragam') }}
                                <svg class="ml-2 w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('dashboard.galeri.index')"
                                :active="request()->routeIs('dashboard.galeri.index')">
                                {{ __('Foto') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('dashboard.videos.index')"
                                :active="request()->routeIs('dashboard.videos.index')">
                                {{ __('Vidio') }}
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>

                    <!-- Dropdown: Kelola Unduhan -->
                    <x-dropdown align="center" width="44">
                        <x-slot name="trigger">
                            <button
                                class="flex items-center px-4 py-2 text-sm font-medium text-gray-500 hover:text-gray-700 ">
                                {{ __('Kelola Unduhan') }}
                                <svg class="ml-2 w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('dashboard.prod-kesehatan.index')"
                                :active="request()->routeIs('dashboard.prod-kesehatan.index')">
                                {{ __('Produk Kesehatan') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('dashboard.prof-kesehatan.index')"
                                :active="request()->routeIs('dashboard.prof-kesehatan.index')">
                                {{ __('Tips Kesehatan') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('dashboard.renstra.index')"
                                :active="request()->routeIs('dashboard.renstra.index')">
                                {{ __('Renstra') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('dashboard.lakip.index')"
                                :active="request()->routeIs('dashboard.lakip.index')">
                                {{ __('Lakip') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('dashboard.doc-lainx.index')"
                                :active="request()->routeIs('dashboard.doc-lainx.index')">
                                {{ __('Dokumen Lainnya') }}
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="44">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border text-sm font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none">
                            <div>{{ Auth::user()->name }}</div>
                            <svg class="ml-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</nav>