<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Galeri Video') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <!-- Tombol Tambah Video -->
                <div class="mb-4">
                    <button onclick="openModal()"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700">
                        Tambah Video
                    </button>
                </div>

                <!-- Tabel Video -->
                <div class="overflow-x-auto">
                    <table id="video-table" class="min-w-full table-auto border-collapse">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-900">Video</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-900">Judul Video</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-900">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($videos as $video)
                            <tr class="border-t hover:bg-gray-50">

                                <!-- Kolom Video -->
                                <td class="px-4 py-3 text-sm text-gray-900">
                                    <video class="w-full h-32 rounded-md" controls>
                                        <source src="{{ asset('storage/' . $video->video_path) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </td>

                                <!-- Kolom Judul Video -->
                                <td class="px-4 py-3 text-sm text-gray-900">{{ $video->title }}</td>

                                <!-- Kolom Aksi -->
                                <td class="px-4 py-3 text-sm text-gray-900">
                                    <!-- Tombol Hapus -->
                                    <button
                                        class="inline-flex items-center px-3 py-1 text-sm font-medium text-red-600 bg-red-100 rounded-md hover:bg-red-200"
                                        onclick="confirmDelete({{ $video->id }})">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                    <!-- Form delete (disembunyikan) -->
                                    <form id="delete-form-{{ $video->id }}"
                                        action="{{ route('dashboard.videos.destroy', $video->id) }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr class="border-t">
                                <td colspan="3" class="px-4 py-3 text-center text-gray-500">
                                    Tidak ada video tersedia
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Video -->
    <div id="add-video-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white rounded-lg shadow-lg max-w-md w-full p-6">
            <h2 class="text-xl font-semibold mb-4">Tambah Video</h2>

            <form action="{{ route('dashboard.videos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Input Video -->
                <div class="mb-4">
                    <label for="video" class="block text-sm font-medium text-gray-700">Pilih Video</label>
                    <input type="file" name="video" id="video" accept="video/*"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        required>
                </div>

                <!-- Input Judul Video -->
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Judul Video</label>
                    <input type="text" name="title" id="title" placeholder="Masukkan judul video"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        required>
                </div>

                <!-- Tombol Simpan -->
                <div class="flex justify-end">
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Script Modal -->
    <script>
        function openModal() {
            document.getElementById('add-video-modal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('add-video-modal').classList.add('hidden');
        }

        function confirmDelete(id) {
            if (confirm('Apakah Anda yakin ingin menghapus video ini?')) {
                document.getElementById('delete-form-' + id).submit();
            }
        }
    </script>
</x-app-layout>