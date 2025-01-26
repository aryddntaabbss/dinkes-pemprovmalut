<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kategori') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <!-- Tombol Tambah Kategori -->
                <div class="mb-4">
                    <a href="{{ route('kategori.create') }}"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700">
                        Tambah Kategori
                    </a>
                </div>

                <!-- Tabel Kategori -->
                <table id="search-table" class="min-w-full">
                    <thead>
                        <tr>
                            <th>
                                <span class="flex items-center">
                                    Nama Ketegori
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
                        @foreach($kategori as $kat)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $kat->nama_kategori }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <!-- Tombol Edit -->
                                <a href="{{ route('kategori.edit', $kat->id) }}" class="inline-flex items-center px-3 py-1 text-sm font-medium text-yellow-600 bg-yellow-100 rounded-md
                                hover:bg-yellow-200">Edit</a>

                                <!-- Tombol Hapus -->
                                <form action="{{ route('kategori.destroy', $kat->id) }}" method="POST"
                                    style="display:inline;"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="inline-flex items-center px-3 py-1 text-sm font-medium text-red-600 bg-red-100 rounded-md hover:bg-red-200">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- <!-- Menampilkan pagination jika menggunakan pagination -->
                <div class="mt-4">
                    {{ $kategori->links() }}
            </div> --}}
        </div>

    </div>
    </div>

</x-app-layout>