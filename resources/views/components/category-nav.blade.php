<nav class="w-full py-4 border-t border-b bg-gray-50"
    x-data="{ open: false, scrollIndex: 0, itemsPerPage: 5, totalItems: {{ count($kategori) }} }">

    <!-- Desktop Navigation with Previous and Next buttons -->
    <div class="w-full sm:flex sm:items-center sm:w-auto sm:px-6">
        <div
            class="w-full container mx-auto flex items-center justify-between sm:space-x-4 text-sm font-bold uppercase mt-2 sm:mt-0">

            <!-- Previous Button (Left aligned) -->
            <div class="flex items-center space-x-4">
                <button @click="scrollIndex = Math.max(scrollIndex - itemsPerPage, 0)" :disabled="scrollIndex === 0"
                    class="flex items-center px-4 py-2 bg-teal-700 text-white rounded-md hover:bg-teal-600 transition-all duration-200 disabled:bg-gray-300 disabled:cursor-not-allowed">
                    <i class="fas fa-chevron-left mr-2"></i> Previous
                </button>
            </div>

            <!-- Category Links (Scrollable) -->
            <div class="flex overflow-x-auto space-x-4 scrollbar-hide w-auto">
                <div class="flex" :style="'transform: translateX(-' + scrollIndex * 220 + 'px)'">
                    @foreach($kategori as $kat)
                    <a href="{{ route('kategori.show', $kat->id) }}"
                        class="min-w-max text-teal-700 hover:bg-teal-700 hover:text-white rounded py-2 px-4 transition-all duration-200 transform hover:scale-105">
                        {{ $kat->nama_kategori }}
                    </a>
                    @endforeach
                </div>
            </div>

            <!-- Next Button (Right aligned) -->
            <div class="flex items-center space-x-4">
                <button
                    @click="scrollIndex = Math.min(scrollIndex + itemsPerPage, Math.max(0, totalItems - itemsPerPage))"
                    :disabled="scrollIndex >= totalItems - itemsPerPage"
                    class="flex items-center px-4 py-2 bg-teal-700 text-white rounded-md hover:bg-teal-600 transition-all duration-200 disabled:bg-gray-300 disabled:cursor-not-allowed">
                    Next <i class="fas fa-chevron-right ml-2"></i>
                </button>
            </div>
        </div>
    </div>
</nav>