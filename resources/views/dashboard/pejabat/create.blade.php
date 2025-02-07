<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h1 class="text-2xl font-semibold mb-6">Tambah Pejabat</h1>

                <!-- Formulir Tambah Pejabat -->
                <form method="POST" action="{{ route('profil-pejabat.store') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Jabatan -->
                    <div class="mb-4">
                        <label for="jabatan" class="block text-sm font-medium text-gray-700">Jabatan</label>
                        <input type="text" name="jabatan" id="jabatan" value="{{ old('jabatan') }}"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            required placeholder="Masukkan jabatan">
                        @error('jabatan')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Nama Pejabat -->
                    <div class="mb-4">
                        <label for="nama_pejabat" class="block text-sm font-medium text-gray-700">Nama Pejabat</label>
                        <input type="text" name="nama_pejabat" id="nama_pejabat" value="{{ old('nama_pejabat') }}"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            required placeholder="Masukkan nama pejabat">
                        @error('nama_pejabat')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Pangkat/Golongan -->
                    <div class="mb-4">
                        <label for="pangkat_golongan"
                            class="block text-sm font-medium text-gray-700">Pangkat/Golongan</label>
                        <input type="text" name="pangkat_golongan" id="pangkat_golongan"
                            value="{{ old('pangkat_golongan') }}"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            required placeholder="Masukkan pangkat/golongan">
                        @error('pangkat_golongan')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- NIP -->
                    <div class="mb-4">
                        <label for="nip" class="block text-sm font-medium text-gray-700">NIP</label>
                        <input type="text" name="nip" id="nip" value="{{ old('nip') }}"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            required placeholder="Masukkan NIP">
                        @error('nip')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Pendidikan -->
                    <div class="mb-4">
                        <label for="pendidikan" class="block text-sm font-medium text-gray-700">Pendidikan</label>
                        <input type="text" name="pendidikan" id="pendidikan" value="{{ old('pendidikan') }}"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            required placeholder="Masukkan pendidikan terakhir">
                        @error('pendidikan')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Foto -->
                    <div class="mb-4">
                        <label for="foto" class="block text-sm font-medium text-gray-700">Foto Profil</label>
                        <div class="mt-1 flex items-center">
                            <input type="file" name="foto" id="foto" class="block w-full text-sm text-gray-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-md file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-indigo-50 file:text-indigo-700
                                    hover:file:bg-indigo-100" accept="image/*" onchange="previewImage(event)">
                        </div>
                        <div class="mt-2">
                            <img id="image-preview" class="w-32 h-32 object-cover rounded-lg" />
                        </div>
                        @error('foto')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="mt-4 inline-block px-6 py-2 bg-blue-500 text-white font-medium text-sm rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                        Simpan Pejabat
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Preview image upload
        function previewImage(event) {
            const preview = document.getElementById('image-preview');
            const file = event.target.files[0];
            
            if (file) {
                preview.classList.remove('hidden');
                preview.src = URL.createObjectURL(file);
            } else {
                preview.classList.add('hidden');
                preview.src = '';
            }
        }
    </script>
</x-app-layout>