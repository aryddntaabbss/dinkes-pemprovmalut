<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kategori') }}
        </h2>
    </x-slot>

    <h1>Ubah Kategori</h1>

    <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="nama_kategori">Nama Kategori:</label>
            <input type="text" id="nama_kategori" name="nama_kategori"
                value="{{ old('nama_kategori', $kategori->nama_kategori) }}" required>
            @error('nama_kategori')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Simpan Perubahan</button>
    </form>

</x-app-layout>