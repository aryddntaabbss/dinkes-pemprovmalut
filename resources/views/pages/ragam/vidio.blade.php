@extends('layouts.main')

@section('body')
<section class="m-4 px-5">
    <div class="w-full max-w-7xl mx-auto">
        <!-- Video -->
        <div class="w-full bg-white border rounded-lg py-8 px-10 text-justify shadow-xl">
            <h2 class="text-4xl font-bold text-gray-800 text-start pb-5">Video</h2>

            <!-- Video -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @forelse ($videos as $video)
                <div class="relative">
                    <video class="w-full h-64 rounded-lg shadow-lg mb-4" controls>
                        <source src="{{ asset('storage/' . $video->video_path) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
                @empty
                <p class="text-center col-span-full text-gray-500">Tidak ada video tersedia.</p>
                @endforelse
            </div>
        </div>
    </div>
</section>
@endsection