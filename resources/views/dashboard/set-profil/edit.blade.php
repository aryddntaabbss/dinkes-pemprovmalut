<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h1 class="text-2xl font-semibold mb-6">Edit Halaman</h1>

                <form method="POST" action="{{ route('profil.update', $profil->slug) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Nama Halaman -->
                    <div class="mb-6">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nama Halaman</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $profil->name) }}"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                            required placeholder="Masukkan nama halaman" oninput="generateSlug()" @if ($profil->slug ===
                        'syarat-ketentuan') readonly @endif>
                        @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Slug -->
                    <div class="mb-6">
                        <label for="slug" class="block text-sm font-medium text-gray-700">Permalink</label>
                        <input type="text" id="slug" name="slug"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                            value="{{ old('slug', $profil->slug) }}" required readonly>
                        @error('slug')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Konten (CKEditor) -->
                    <div class="mb-6">
                        <label for="content" class="block text-sm font-medium text-gray-700">Konten</label>
                        <textarea id="content" name="content"
                            class="form-control mt-1 w-full border border-gray-300 rounded-md shadow-sm">{{ old('content', $profil->content) }}</textarea>
                        @error('content')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div class="mb-6">
                        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                        <div class="flex items-center space-x-6">
                            <div class="flex items-center">
                                <input class="form-radio" type="radio" name="status" id="status_aktif" value="aktif"
                                    {{ old('status', $profil->status) == 'aktif' ? 'checked' : '' }} required>
                                <label class="ml-2 text-sm" for="status_aktif">Aktif</label>
                            </div>
                            <div class="flex items-center">
                                <input class="form-radio" type="radio" name="status" id="status_tidak_aktif"
                                    value="tidak" {{ old('status', $profil->status) == 'tidak' ? 'checked' : '' }}
                                    required>
                                <label class="ml-2 text-sm" for="status_tidak_aktif">Tidak Aktif</label>
                            </div>
                        </div>
                        @error('status')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-start space-x-2">
                        <button type="button" class="py-2 px-4 rounded-md bg-gray-200 text-gray-700 hover:bg-gray-300"
                            onclick="window.history.back()">Batal</button>
                        <button type="submit"
                            class="py-2 px-4 rounded-md bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
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