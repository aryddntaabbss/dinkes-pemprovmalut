<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <h1 class="text-2xl font-semibold mb-6">Ubah Berita</h1>

                <!-- Form Ubah Berita -->
                <form action="{{ route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Input Judul Berita -->
                    <div class="mb-4">
                        <label for="judul" class="block text-sm font-medium text-gray-700">Judul Berita:</label>
                        <input type="text" id="judul" name="judul" value="{{ old('judul', $berita->judul) }}"
                            class="mt-1 p-2 w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                        @error('judul')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Input Penulis -->
                    <div class="mb-4">
                        <label for="penulis" class="block text-sm font-medium text-gray-700">Penulis:</label>
                        <input type="text" id="penulis" name="penulis" value="{{ old('penulis', $berita->penulis) }}"
                            class="mt-1 p-2 w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @error('penulis')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Input Kategori -->
                    <div class="mb-4">
                        <label for="kategori_id" class="block text-sm font-medium text-gray-700">Kategori:</label>
                        <select id="kategori_id" name="kategori_id"
                            class="mt-1 p-2 w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Pilih Kategori</option>
                            @foreach($kategori as $k)
                            <option value="{{ $k->id }}"
                                {{ old('kategori_id', $berita->kategori_id) == $k->id ? 'selected' : '' }}>
                                {{ $k->nama_kategori }}
                            </option>
                            @endforeach
                        </select>
                        @error('kategori_id')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Input Konten Berita -->
                    <div class="mb-4">
                        <label for="konten" class="block text-sm font-medium text-gray-700">Konten Berita:</label>
                        <textarea id="konten" name="konten" rows="5"
                            class="mt-1 p-2 w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>{{ old('konten', $berita->konten) }}</textarea>
                        @error('konten')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Input Gambar Berita -->
                    <div class="mb-4">
                        <label for="gambar" class="block text-sm font-medium text-gray-700">Gambar Berita:</label>
                        <input type="file" id="gambar" name="gambar"
                            class="mt-1 w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @if ($berita->gambar)
                        <div class="mt-2">
                            <img src="{{ Storage::url($berita->gambar) }}" alt="Current Image"
                                class="w-32 h-32 object-cover">
                        </div>
                        @endif
                        @error('gambar')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Input Keterangan Gambar -->
                    <div class="mb-4">
                        <label for="ket_gambar" class="block text-sm font-medium text-gray-700">Keterangan
                            Gambar:</label>
                        <input type="text" id="ket_gambar" name="ket_gambar"
                            value="{{ old('ket_gambar', $berita->ket_gambar) }}"
                            class="mt-1 p-2 w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                        @error('ket_gambar')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Checkbox Up Berita -->
                    <div class="mb-4">
                        <label for="up_berita" class="inline-flex items-center">
                            <input type="checkbox" id="up_berita" name="up_berita"
                                {{ old('up_berita', $berita->up_berita) ? 'checked' : '' }}
                                class="form-checkbox h-5 w-5 text-blue-600 border-gray-300 rounded">
                            <span class="ml-2 text-sm text-gray-700">Up Berita?</span>
                        </label>
                    </div>

                    <div class="flex gap-3">
                        <!-- Submit Button -->
                        <div class="flex flex-col mt-6">
                            <button type="submit"
                                class="px-4 py-2 bg-blue-500 text-white rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                Ubah Berita
                            </button>
                        </div>

                        <!-- Tombol Batal -->
                        <div class="flex flex-col mt-6">
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