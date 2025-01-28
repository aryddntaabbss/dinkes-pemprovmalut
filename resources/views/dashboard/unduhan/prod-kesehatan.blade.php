<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Produk Kesehatan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <!-- Tombol Tambah File Produk Kesehatan -->
                <div class="mb-4">
                    <button onclick="openModal()"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700">
                        Tambah File
                    </button>
                </div>

                <!-- Tabel File Produk Kesehatan -->
                <div class="overflow-x-auto">
                    <table id="prod-kesehatan-table" class="min-w-full table-auto border-collapse">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-900">Nama File</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-900">File</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-900">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($prodKesehatan as $item)
                            <tr class="border-t hover:bg-gray-50">
                                <!-- Kolom Nama File -->
                                <td class="px-4 py-3 text-sm text-gray-900">{{ $item->nama }}</td>

                                <!-- Kolom File -->
                                <td class="px-4 py-3 text-sm">
                                    @if ($item->file_path)
                                    <a href="{{ Storage::url($item->file_path) }}" class="text-blue-600"
                                        target="_blank">
                                        Unduh File
                                    </a>
                                    @else
                                    <span class="text-red-500">File tidak tersedia</span>
                                    @endif
                                </td>


                                <!-- Kolom Aksi -->
                                <td class="px-4 py-3 text-sm text-gray-900">
                                    <button
                                        class="inline-flex items-center px-3 py-1 text-sm font-medium text-red-600 bg-red-100 rounded-md hover:bg-red-200"
                                        onclick="confirmDelete({{ $item->id }})">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                    <form id="delete-form-{{ $item->id }}"
                                        action="{{ route('dashboard.prod-kesehatan.destroy', $item->id) }}"
                                        method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr class="border-t">
                                <td colspan="3" class="px-4 py-3 text-center text-gray-500">
                                    Tidak ada file produk kesehatan tersedia.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah File Produk Kesehatan -->
    <div id="add-file-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white rounded-lg shadow-lg max-w-md w-full p-6">
            <h2 class="text-xl font-semibold mb-4">Tambah File</h2>

            <form action="{{ route('dashboard.prod-kesehatan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Input Nama -->
                <div class="mb-4">
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama File</label>
                    <input type="text" name="nama" id="nama"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        placeholder="Masukkan nama file" required>
                </div>

                <!-- Input File -->
                <div class="mb-4">
                    <label for="file" class="block text-sm font-medium text-gray-700">Unggah File</label>
                    <input type="file" name="file" id="file" accept="application/pdf,image/*"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        required>
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
            document.getElementById('add-file-modal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('add-file-modal').classList.add('hidden');
        }

        function confirmDelete(id) {
            if (confirm('Apakah Anda yakin ingin menghapus file ini?')) {
                document.getElementById('delete-form-' + id).submit();
            }
        }
    </script>
</x-app-layout>