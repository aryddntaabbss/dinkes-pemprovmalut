<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h1 class="text-2xl font-semibold mb-6">Tambah Halaman</h1>

                <!-- Formulir Tambah Halaman -->
                <form method="POST" action="{{ route('profil.store') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Nama Halaman -->
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nama Halaman</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            required placeholder="Masukkan nama halaman" oninput="generateSlug()">
                        @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Slug (Otomatis dari Nama Halaman) -->
                    <div class="mb-4">
                        <label for="slug" class="block text-sm font-medium text-gray-700">Permalink</label>
                        <input type="text" id="slug" name="slug" value="{{ old('slug') }}"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            required readonly>
                        @error('slug')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Konten (CKEditor) -->
                    <div class="mb-4">
                        <label for="content" class="block text-sm font-medium text-gray-700">Konten</label>
                        <textarea name="content" id="content" class="form-control">{{ old('content') }}</textarea>
                        @error('content')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div class="mb-4">
                        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                        <div class="space-y-2">
                            <div class="flex items-center">
                                <input type="radio" name="status" id="status_aktif" value="aktif"
                                    {{ old('status') == 'aktif' ? 'checked' : '' }} required>
                                <label class="ml-2 text-sm" for="status_aktif">Aktif</label>
                            </div>
                            <div class="flex items-center">
                                <input type="radio" name="status" id="status_tidak_aktif" value="tidak"
                                    {{ old('status') == 'tidak' ? 'checked' : '' }} required>
                                <label class="ml-2 text-sm" for="status_tidak_aktif">Tidak Aktif</label>
                            </div>
                        </div>
                        @error('status')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="mt-4 inline-block px-6 py-2 bg-blue-500 text-white font-medium text-sm rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                        Simpan
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Tambahkan CKEditor Script -->
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#content'))
            .catch(error => {
                console.error(error);
            });

        function generateSlug() {
            const name = document.getElementById('name').value;
            const slug = name.toLowerCase()
                .replace(/[^a-z0-9 -]/g, '') // Menghapus karakter non-alfanumerik
                .replace(/\s+/g, '-') // Mengganti spasi dengan "-"
                .replace(/-+/g, '-'); // Mengganti "--" menjadi "-"
            document.getElementById('slug').value = slug;
        }
    </script>
</x-app-layout>