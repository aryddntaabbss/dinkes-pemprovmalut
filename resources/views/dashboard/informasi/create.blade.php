<x-app-layout>
    <div class="py-9">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <h1 class="text-2xl font-semibold mb-6">Tambah Informasi</h1>

                <!-- Form Tambah Informasi -->
                <form action="{{ route('informasi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Judul Informasi -->
                    <div class="mb-4">
                        <label for="judul" class="block text-sm font-medium text-gray-700">Judul Informasi:</label>
                        <input type="text" id="judul" name="judul" value="{{ old('judul') }}"
                            placeholder="Masukkan judul informasi"
                            class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500"
                            required>
                        @error('judul')
                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Kategori Informasi -->
                    <div class="mb-4">
                        <label for="kategori_id" class="block text-sm font-medium text-gray-700">Kategori:</label>
                        <select id="kategori_id" name="kategori_id"
                            class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500"
                            required>
                            <option value="" disabled selected>Pilih kategori</option>
                            @foreach($kategori as $kat)
                            <option value="{{ $kat->id }}" {{ old('kategori_id') == $kat->id ? 'selected' : '' }}>
                                {{ $kat->nama_kategori }}
                            </option>
                            @endforeach
                        </select>
                        @error('kategori_id')
                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Konten Informasi (CKEditor) -->
                    <div class="mb-4">
                        <label for="konten" class="block text-sm font-medium text-gray-700">Konten Informasi:</label>
                        <textarea id="konten" name="konten" rows="6"
                            class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500"
                            placeholder="Masukkan isi konten berita" style="display: none;"></textarea>

                        <input type="hidden" id="konten_hidden" name="konten_hidden">
                        @error('konten')
                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>



                    <!-- Gambar Informasi -->
                    <div class="mb-4">
                        <label for="gambar" class="block text-sm font-medium text-gray-700">Gambar Informasi:</label>
                        <input type="file" id="gambar" name="gambar" accept="image/*"
                            class="mt-1 w-full border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500">
                        <img id="previewGambar" src="#" alt="Preview Gambar"
                            class="hidden w-32 h-32 object-cover rounded-md mt-2">
                        @error('gambar')
                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Keterangan Gambar -->
                    <div class="mb-4">
                        <label for="ket_gambar" class="block text-sm font-medium text-gray-700">Keterangan
                            Gambar:</label>
                        <input type="text" id="ket_gambar" name="ket_gambar" value="{{ old('ket_gambar') }}"
                            placeholder="Masukkan Keterangan Gambar"
                            class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500"
                            required>
                        @error('ket_gambar')
                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="flex gap-3">
                        <button type="submit"
                            class="px-4 py-2 bg-blue-500 text-white rounded-md shadow-sm hover:bg-blue-700 focus:ring-2 focus:ring-blue-500">
                            Simpan
                        </button>
                        <a href="{{ route('informasi.index') }}"
                            class="px-4 py-2 bg-gray-500 text-white rounded-md shadow-sm hover:bg-gray-700 focus:ring-2 focus:ring-gray-500">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- CKEditor & Preview Gambar -->
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
        ClassicEditor.create(document.querySelector('#konten'))
        .then(editor => {
        editor.model.document.on('change:data', () => {
        document.querySelector('#konten_hidden').value = editor.getData();
        });
        })
        .catch(error => console.error('CKEditor Error:', error));
        });
    </script>
</x-app-layout>