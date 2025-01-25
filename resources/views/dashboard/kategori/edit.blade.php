<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h1 class="text-2xl font-semibold mb-6">Ubah Kategori</h1>

                <!-- Form Ubah Kategori -->
                <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Input Nama Kategori -->
                    <div class="mb-4">
                        <label for="nama_kategori" class="block text-sm font-medium text-gray-700">Nama
                            Kategori:</label>
                        <input type="text" id="nama_kategori" name="nama_kategori"
                            value="{{ old('nama_kategori', $kategori->nama_kategori) }}"
                            class="mt-1 p-2 w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                        @error('nama_kategori')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex gap-3">
                        <!-- Submit Button -->
                        <div class="flex flex-col">
                            <button type="submit"
                                class="px-4 py-2 bg-blue-500 text-white rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                Ubah Kategori
                            </button>
                        </div>

                        <!-- Tombol Batal -->
                        <div class="flex flex-col">
                            <a href="{{ route('kategori.index') }}"
                                class="px-4 py-2 bg-gray-500 text-white rounded-md shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500">
                                Batal
                            </a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>