<!-- Berita Terpopuler -->
<div class="w-full bg-white shadow-lg rounded-lg flex flex-col p-6">
    <p class="text-xl font-bold">Berita Terpopuler</p>

    <div class="space-y-4">
        @foreach($beritaTerpopuler as $item)
        <div class="flex items-center space-x-2 border-b py-2">
            <!-- Gambar -->
            <img class="w-14 h-20 object-cover rounded-md" src="{{ asset('storage/' . $item->gambar) }}"
                alt="{{ $item->judul }}">

            <div class="flex-1">
                <!-- Judul -->
                <h3 class="text-lg font-semibold text-gray-800 hover:text-teal-500 transition-colors">
                    <a href="{{ route('berita.show', $item->id) }}">{{ Str::limit(strip_tags($item->judul), 20) }}</a>
                </h3>

                <!-- Excerpt -->
                <p class="text-gray-600 text-justify">
                    {{ Str::limit(strip_tags($item->konten), 22) }}
                </p>

                <!-- Meta Information -->
                <div class="text-sm text-gray-500 pt-2">
                    <span>Oleh <a href="#"
                            class="font-medium text-gray-700 hover:text-gray-900 transition-colors">{{ $item->penulis }}</a></span>
                    <span class="mx-1">•</span>
                    <time
                        datetime="{{ $item->created_at->format('Y-m-d') }}">{{ $item->created_at->format('d M Y') }}</time>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>