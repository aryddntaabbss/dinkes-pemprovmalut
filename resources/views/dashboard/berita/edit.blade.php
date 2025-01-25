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

                    <!-- Input Kategori -->
                    <div class="mb-4">
                        <label for="kategori_id" class="block text-sm font-medium text-gray-700">Kategori:</label>
                        <select id="kategori_id" name="kategori_id"
                            class="mt-1 p-2 w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                            @foreach($kategori as $kat)
                            <option value="{{ $kat->id }}"
                                {{ $kat->id == old('kategori_id', $berita->kategori_id) ? 'selected' : '' }}>
                                {{ $kat->nama_kategori }}
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
                        <textarea id="konten" name="konten" rows="4"
                            class="mt-1 p-2 w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>{{ old('konten', $berita->konten) }}</textarea>
                        @error('konten')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Penulis Berita -->
                    <div class="mb-4">
                        <label for="penulis" class="block text-sm font-medium text-gray-700">Penulis:</label>
                        <input type="text" id="penulis" name="penulis" value="{{ old('penulis', $berita->penulis) }}"
                            class="mt-1 p-2 w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @error('penulis')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Up Berita (Tombol) -->
                    <div class="mb-4">
                        <form action="{{ route('berita.update.up', $berita->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit"
                                class="px-4 py-2 rounded-md text-white {{ $berita->up_berita ? 'bg-blue-600 hover:bg-blue-700' : 'bg-gray-600 hover:bg-gray-700' }}">
                                {{ $berita->up_berita ? 'Populer' : 'Tidak Populer' }}
                            </button>
                        </form>
                        @error('up_berita')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Input Gambar Berita -->
                    <div class="mb-4">
                        <label for="gambar" class="block text-sm font-medium text-gray-700">Gambar Berita
                            (Opsional):</label>
                        <input type="file" id="gambar" name="gambar"
                            class="mt-1 w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">

                        @if($berita->gambar)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Gambar Berita" width="100">
                            <a href="{{ route('berita.destroy', $berita->id) }}"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus gambar?')"
                                class="text-red-500 text-sm hover:text-red-700 ml-2">Hapus Gambar</a>
                        </div>
                        @endif
                        @error('gambar')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Tombol Submit -->
                    <div>
                        <button type="submit"
                            class="w-full py-2 px-4 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>