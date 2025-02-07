<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Profil Pejabat') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="mb-4">
                    <a href="{{ route('profil-pejabat.create') }}"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700">
                        Tambah Pejabat
                    </a>
                </div>

                <!-- Table Profil Pejabat -->
                <div class="overflow-x-auto">
                    <table id="search-table" class="min-w-full table-auto border-collapse">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-900">Jabatan</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-900">Nama Pejabat</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-900">Pangkat/Golongan</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-900">NIP</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-900">Pendidikan</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-900">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pejabat as $item)
                            <tr class="border-t hover:bg-gray-50">
                                <td class="px-4 py-3 text-sm text-gray-900">{{ $item->jabatan }}</td>
                                <td class="px-4 py-3 text-sm text-gray-900">{{ $item->nama_pejabat }}
                                </td>
                                <td class="px-4 py-3 text-sm text-gray-900">
                                    {{ $item->pangkat_golongan }}
                                </td>
                                <td class="px-4 py-3 text-sm text-gray-900">{{ $item->nip }}</td>
                                <td class="px-4 py-3 text-sm text-gray-900">{{ $item->pendidikan }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('profil-pejabat.edit', $item->id) }}"
                                            class="text-indigo-600 hover:text-indigo-900">
                                            Edit
                                        </a>
                                        <form id="delete-form-{{ $item->id }}"
                                            action="{{ route('profil-pejabat.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" onclick="confirmDelete({{ $item->id }})"
                                                class="text-red-600 hover:text-red-900">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(id) {
            if (confirm('Apakah Anda yakin ingin menghapus data pejabat ini?')) {
                document.getElementById(`delete-form-${id}`).submit();
            }
        }
    </script>
</x-app-layout>