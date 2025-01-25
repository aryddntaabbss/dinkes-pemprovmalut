<x-app-layout>
    <div class="py-9">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <h1 class="text-2xl font-semibold mb-6">Tambah Berita</h1>

                <!-- Form Tambah Berita -->
                <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Penulis Berita -->
                    <div class="mb-4">
                        <label for="penulis" class="block text-sm font-medium text-gray-700">Penulis :</label>
                        <input type="text" id="penulis" name="penulis" value="{{ old('penulis') }}"
                            class="mt-1 p-2 w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @error('penulis')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Judul Berita -->
                    <div class="mb-4">
                        <label for="judul" class="block text-sm font-medium text-gray-700">Judul Berita :</label>
                        <input type="text" id="judul" name="judul" value="{{ old('judul') }}"
                            class="mt-1 p-2 w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                        @error('judul')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Kategori Berita -->
                    <div class="mb-4">
                        <label for="kategori_id" class="block text-sm font-medium text-gray-700">Kategori :</label>
                        <select id="kategori_id" name="kategori_id"
                            class="mt-1 p-2 w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                            @foreach($kategori as $kat)
                            <option value="{{ $kat->id }}" {{ old('kategori_id') == $kat->id ? 'selected' : '' }}>
                                {{ $kat->nama_kategori }}
                            </option>
                            @endforeach
                        </select>
                        @error('kategori_id')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Konten Berita (CKEditor) -->
                    <div class="mb-4">
                        <label for="konten" class="block text-sm font-medium text-gray-700">Konten Berita :</label>
                        <textarea id="konten" name="konten" rows="6"
                            class="mt-1 p-2 w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('konten') }}</textarea>
                        @error('konten')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Gambar Berita -->
                    <div class="mb-4">
                        <label for="gambar" class="block text-sm font-medium text-gray-700">Gambar Berita :</label>
                        <input type="file" id="gambar" name="gambar"
                            class="mt-1 w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @error('gambar')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Berita Terpopuler (Checkbox) -->
                    <div class="mb-4">
                        <label for="up_berita" class="inline-flex items-center">
                            <input type="checkbox" id="up_berita" name="up_berita" class="form-checkbox text-teal-600"
                                {{ old('up_berita') ? 'checked' : '' }}>
                            <span class="ml-2">Berita Terpopuler</span><span
                                class="ml-2 text-gray-500">(opsional)</span>
                        </label>
                        @error('up_berita')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex gap-3">
                        <!-- Submit Button -->
                        <div class="flex flex-col">
                            <button type="submit"
                                class="px-4 py-2 bg-blue-500 text-white rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                Simpan
                            </button>
                        </div>

                        <!-- Tombol Batal -->
                        <div class="flex flex-col">
                            <a href="{{ route('berita.index') }}"
                                class="px-4 py-2 bg-gray-500 text-white rounded-md shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500">
                                Batal
                            </a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#konten'))
            .catch(error => {
                console.error(error);
            });
    </script>
</x-app-layout>