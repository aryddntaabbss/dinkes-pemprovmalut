<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Struktur Organisasi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <!-- Tombol Tambah Struktur Organisasi -->
                <div class="mb-4">
                    <button onclick="openModal()"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700">
                        Tambah Struktur
                    </button>
                </div>

                <!-- Tabel Struktur Organisasi -->
                <div class="overflow-x-auto">
                    <table id="search-table" class="min-w-full table-auto border-collapse">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-900">Gambar</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-900">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($struktur as $item)
                            <tr class="border-t hover:bg-gray-50">
                                <td class="px-4 py-3 text-sm text-gray-900">
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="Struktur Organisasi"
                                        width="150">
                                </td>
                                <td class="px-4 py-3 text-sm text-gray-900">
                                    <!-- Form Hapus -->
                                    <form action="{{ route('struktur.destroy', $item->id) }}" method="POST"
                                        id="delete-form-{{ $item->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="confirmDelete({{ $item->id }})"
                                            class="inline-flex items-center px-3 py-1 text-sm font-medium text-red-600 bg-red-100 rounded-md hover:bg-red-200">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Struktur Organisasi -->
    <div id="add-file-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white rounded-lg shadow-lg max-w-md w-full p-6">
            <h2 class="text-xl font-semibold mb-4">Tambah File</h2>
            <form action="{{ route('struktur.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="image" class="block w-full mb-4 border p-2 rounded" required>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Upload</button>
                <button type="button" onclick="closeModal()"
                    class="bg-gray-400 text-white px-4 py-2 rounded">Batal</button>
            </form>
        </div>
    </div>

    <!-- Script Modal & Konfirmasi Hapus -->
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