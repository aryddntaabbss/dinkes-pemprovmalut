<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Galeri Foto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <!-- Tombol Tambah Foto -->
                <div class="mb-4">
                    <button onclick="openModal()"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700">
                        Tambah Foto
                    </button>
                </div>

                <!-- Tabel Galeri -->
                <div class="overflow-x-auto">
                    <table id="gallery-table" class="min-w-full table-auto border-collapse">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-900">Foto</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-900">Kategori</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-900">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($galeri as $item)
                            <tr class="border-t hover:bg-gray-50">
                                <!-- Kolom Foto -->
                                <td class="px-4 py-3">
                                    <img src="{{ Storage::url($item->image_path) }}" alt="Foto"
                                        class="w-10 h-10 object-cover rounded-md">
                                </td>

                                <!-- Kolom Kategori -->
                                <td class="px-4 py-3 text-sm text-gray-900">{{ $item->category }}</td>

                                <!-- Kolom Aksi -->
                                <td class="px-4 py-3 text-sm text-gray-900">
                                    <!-- Tombol Hapus -->
                                    <button
                                        class="inline-flex items-center px-3 py-1 text-sm font-medium text-red-600 bg-red-100 rounded-md hover:bg-red-200"
                                        onclick="confirmDelete({{ $item->id }})">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                    <!-- Form delete (disembunyikan) -->
                                    <form id="delete-form-{{ $item->id }}"
                                        action="{{ route('dashboard.galeri.destroy', $item->id) }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr class="border-t">
                                <td colspan="3" class="px-4 py-3 text-center text-gray-500">
                                    Gambar Kosong
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Foto -->
    <div id="add-photo-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white rounded-lg shadow-lg max-w-md w-full p-6">
            <h2 class="text-xl font-semibold mb-4">Tambah Foto</h2>

            <form action="{{ route('dashboard.galeri.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Input Gambar -->
                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700">Pilih Gambar</label>
                    <input type="file" name="image" id="image" accept="image/*"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        required>
                </div>

                <!-- Input Kategori -->
                <div class="mb-4">
                    <label for="category" class="block text-sm font-medium text-gray-700">Kategori</label>
                    <input type="text" name="category" id="category"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        placeholder="Masukkan kategori foto" required>
                </div>

                <!-- Tombol Simpan -->
                <div class="flex justify-end">
                    <button type="button" onclick="closeModal()"
                        class="px-4 py-2 bg-gray-500 text-white font-medium rounded-md hover:bg-gray-600 mr-2">
                        Batal
                    </button>
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Script Modal -->
    <script>
        function openModal() {
            document.getElementById('add-photo-modal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('add-photo-modal').classList.add('hidden');
        }

        function confirmDelete(id) {
            if (confirm('Apakah Anda yakin ingin menghapus foto ini?')) {
                document.getElementById('delete-form-' + id).submit();
            }
        }
    </script>
</x-app-layout>