<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Informasi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="mb-4">
                    <a href="{{ route('informasi.create') }}"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700">
                        Tambah Halaman
                    </a>
                </div>

                <!-- Table Informasi -->
                <div class="overflow-x-auto">
                    <table id="search-table" class="min-w-full table-auto border-collapse">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-900">Nama Halaman</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-900">Status</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-900">URL</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-900">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($informasi as $item)
                            <tr class="border-t hover:bg-gray-50">
                                <td class="px-4 py-3 text-sm text-gray-900">{{ $item->name }}</td>
                                <td class="px-4 py-3 text-sm">
                                    <span
                                        class="inline-block px-2 py-1 rounded-full text-xs font-medium {{ $item->status == 'aktif' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ ucfirst($item->status) }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-sm text-gray-900">
                                    {{ config('app.url') }}/informasi/{{ $item->slug }}
                                </td>
                                <td class="px-4 py-3 text-sm text-gray-900 flex space-x-2">
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('informasi.edit', $item->id) }}"
                                        class="inline-flex items-center px-3 py-1 text-sm font-medium text-yellow-600 bg-yellow-100 rounded-md hover:bg-yellow-200">
                                        <i class="bi bi-pencil"></i> Edit
                                    </a>

                                    @if ($item->slug != 'syarat-ketentuan')
                                    <!-- Tombol Delete -->
                                    <button
                                        class="inline-flex items-center px-3 py-1 text-sm font-medium text-red-600 bg-red-100 rounded-md hover:bg-red-200"
                                        onclick="confirmDelete({{ $item->id }})">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                    <!-- Form delete (disembunyikan) -->
                                    <form id="delete-form-{{ $item->id }}"
                                        action="{{ route('informasi.destroy', $item->id) }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Script untuk konfirmasi penghapusan -->
    <script>
        function confirmDelete(id) {
            if (confirm('Apakah Anda yakin ingin menghapus halaman informasi ini?')) {
                document.getElementById('delete-form-' + id).submit();
            }
        }
    </script>
</x-app-layout>