<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <h1 class="text-2xl font-semibold mb-6">Ubah Informasi</h1>

                <!-- Form Ubah Informasi -->
                <form action="{{ route('informasi.update', $informasi->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Input Judul Informasi -->
                    <div class="mb-4">
                        <label for="judul" class="block text-sm font-medium text-gray-700">Judul Informasi:</label>
                        <input type="text" id="judul" name="judul" value="{{ old('judul', $informasi->judul) }}"
                            class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500"
                            required>
                        @error('judul')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Input Kategori -->
                    <div class="mb-4">
                        <label for="kategori_id" class="block text-sm font-medium text-gray-700">Kategori:</label>
                        <select id="kategori_id" name="kategori_id"
                            class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500">
                            <option value="">Pilih Kategori</option>
                            @foreach($kategori as $k)
                            <option value="{{ $k->id }}"
                                {{ old('kategori_id', $informasi->kategori_id) == $k->id ? 'selected' : '' }}>
                                {{ $k->nama_kategori }}
                            </option>
                            @endforeach
                        </select>
                        @error('kategori_id')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Input Konten Informasi -->
                    <div class="mb-4">
                        <label for="konten" class="block text-sm font-medium text-gray-700">Konten Informasi:</label>
                        <textarea id="konten" name="konten" rows="5"
                            class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500"
                            required>{{ old('konten', $informasi->konten) }}</textarea>
                        @error('konten')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Input Gambar Informasi -->
                    <div class="mb-4">
                        <label for="gambar" class="block text-sm font-medium text-gray-700">Gambar Informasi:</label>
                        <input type="file" id="gambar" name="gambar"
                            class="mt-1 w-full border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500">

                        @if ($informasi->gambar)
                        <div class="mt-2">
                            <img src="{{ Storage::url($informasi->gambar) }}" alt="Gambar Informasi"
                                class="w-32 h-32 object-cover rounded-md shadow-md">
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
                            value="{{ old('ket_gambar', $informasi->ket_gambar) }}"
                            class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500"
                            required>
                        @error('ket_gambar')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Tombol Up Informasi -->
                    <div class="mb-4 flex items-center">
                        <input type="checkbox" id="up_informasi" name="up_informasi" value="1"
                            {{ $informasi->up_informasi ? 'checked' : '' }}
                            class="mr-2 border-gray-300 rounded text-blue-600 focus:ring-blue-500">
                        <label for="up_informasi" class="text-sm text-gray-700">
                            Tandai sebagai Informasi Populer
                        </label>
                    </div>

                    <div class="flex gap-3 mt-6">
                        <!-- Submit Button -->
                        <button type="submit"
                            class="px-4 py-2 bg-blue-500 text-white rounded-md shadow-sm hover:bg-blue-700 focus:ring-2 focus:ring-blue-500">
                            Ubah Informasi
                        </button>

                        <!-- Tombol Batal -->
                        <a href="{{ route('informasi.index') }}"
                            class="px-4 py-2 bg-gray-500 text-white rounded-md shadow-sm hover:bg-gray-700 focus:ring-2 focus:ring-gray-500">
                            Batal
                        </a>
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