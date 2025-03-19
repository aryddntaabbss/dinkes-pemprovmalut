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
                    <video class="w-full h-64 rounded-lg shadow-lg" controls>
                        <source src="{{ asset('storage/' . $video->video_path) }}" type="video/mp4">
                        <source src="{{ asset('storage/' . $video->video_path) }}" type="video/webm">
                        <source src="{{ asset('storage/' . $video->video_path) }}" type="video/ogg">
                        <source src="{{ asset('storage/' . $video->video_path) }}" type="video/avi">
                        <source src="{{ asset('storage/' . $video->video_path) }}" type="video/mov">
                        <source src="{{ asset('storage/' . $video->video_path) }}" type="video/wmv">
                        Your browser does not support the video tag.
                    </video>
                    <p class="text-sm py-1 font-medium text-blue-500"><span class="mr-2">•</span>{{ $video->ket_video }}
                    </p>
                    <h1 class="text-xl font-bold text-gray-800">{{ $video->title }}</h1>
                </div>
                @empty
                <p class="text-center col-span-full text-gray-500">Tidak ada video tersedia.</p>
                @endforelse
            </div>
        </div>
    </div>
</section>
@endsection