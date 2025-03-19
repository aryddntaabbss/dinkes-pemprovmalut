<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Informasi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
                <!-- Tombol Tambah Informasi -->
                <div class="mb-4">
                    <a href="{{ route('informasi.create') }}"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700">
                        Tambah Informasi
                    </a>
                </div>

                <!-- Tabel Informasi -->
                <table id="search-table" class="min-w-full">
                    <thead>
                        <tr>
                            <th>
                                <span class="flex items-center">
                                    No
                                </span>
                            </th>
                            <th>
                                <span class="flex items-center">
                                    Judul Informasi
                                </span>
                            </th>
                            <th>
                                <span class="flex items-center">
                                    Konten
                                </span>
                            </th>
                            <th>
                                <span class="flex items-center">
                                    Kategori
                                </span>
                            </th>
                            <th>
                                <span class="flex items-center">
                                    Tanggal Dibuat
                                </span>
                            </th>
                            <th>
                                <span class="flex items-center">
                                    Status
                                </span>
                            </th>
                            <th>
                                <span class="flex items-center">
                                    Aksi
                                </span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($informasi as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $item->judul }}
                            </td>
                            <td>{{ Str::limit(strip_tags($item->konten), 50) }}</td>
                            <td>{{ $item->kategori->nama_kategori }}</td>
                            <td>{{ $item->created_at->format('Y-m-d H:i') }}</td>

                            <!-- Up Informasi (Tombol) -->
                            <td>
                                <form action="{{ route('informasi.update.up', $item->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit"
                                        class="px-3 py-2 rounded-md text-white {{ $item->up_informasi ? 'bg-blue-600 hover:bg-blue-700' : 'bg-gray-600 hover:bg-gray-700' }}">
                                        {!! $item->up_informasi ? '<i class="fa-solid fa-eye"></i>' : '<i
                                            class="fa-solid fa-eye-slash"></i>' !!}
                                    </button>
                                </form>
                            </td>

                            <td class="flex justify-center items-center space-x-2 text-white font-semibold">
                                <!-- Tombol Edit -->
                                <a href="{{ route('informasi.edit', $item->id) }}" class="inline-flex items-center px-3 py-1 text-sm font-medium text-yellow-600 bg-yellow-100 rounded-md
                                    hover:bg-yellow-200" title="Edit">
                                    Edit
                                </a>

                                <!-- Tombol Hapus -->
                                <form action="{{ route('informasi.destroy', $item->id) }}" method="POST"
                                    style="display:inline;"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus informasi ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="inline-flex items-center px-3 py-1 text-sm font-medium text-red-600 bg-red-100 rounded-md hover:bg-red-200"
                                        title="Hapus">
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

</x-app-layout>