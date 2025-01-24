<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Berita') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
                <!-- Tombol Tambah Berita -->
                <div class="mb-4">
                    <a href="{{ route('berita.create') }}"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700">
                        Tambah Berita
                    </a>
                </div>

                <!-- Tabel Berita -->
                <table id="search-table" class="min-w-full">
                    <thead>
                        <tr>
                            <th>
                                <span class="flex items-center">
                                    Judul Berita
                                </span>
                            </th>
                            <th>
                                <span class="flex items-center">
                                    Kategori
                                </span>
                            </th>
                            <th>
                                <span class="flex items-center">
                                    Konten
                                </span>
                            </th>
                            <th>
                                <span class="flex items-center">
                                    Tanggal Dibuat
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
                        @foreach($berita as $item)
                        <tr>
                            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $item->judul }}
                            </td>
                            <td>{{ $item->kategori->nama_kategori }}</td>
                            <td>{{ Str::limit(strip_tags($item->konten), 50) }}</td>
                            <td>{{ $item->created_at->format('Y-m-d H:i') }}</td>

                            <td class="flex space-x-2">
                                <!-- Tombol Edit -->
                                <a href="{{ route('berita.edit', $item->id) }}"
                                    class="text-blue-600 hover:text-blue-800">
                                    Edit
                                </a>

                                <!-- Tombol Hapus -->
                                <form action="{{ route('berita.destroy', $item->id) }}" method="POST"
                                    style="display:inline;"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800">Hapus</button>
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