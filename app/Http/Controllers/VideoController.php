<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    // Menampilkan daftar video
    public function index()
    {
        $videos = Video::all();  // Ambil semua data video
        return view('dashboard.ragam.vidio', compact('videos'));
    }

    // Menyimpan video baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'video' => 'required|mimes:mp4,avi,mov,wmv,webm,ogg|max:102400', // Validasi file video
            'ket_video' => 'required|string|max:255',
            'title' => 'required|string|max:255',
        ]);

        // Menyimpan video ke storage/public/videos
        $videoPath = $request->file('video')->store('videos', 'public');

        Video::create([
            'title' => $request->title,
            'ket_video' => $request->ket_video,
            'video_path' => $videoPath, // Simpan path yang diberikan langsung oleh Laravel
        ]);


        return redirect()->route('dashboard.videos.index')->with('success', 'Video berhasil diupload!');
    }


    // Menghapus video
    public function destroy($id)
    {
        $video = Video::findOrFail($id);
        $video->delete();

        return redirect()->route('dashboard.videos.index')->with('success', 'Video berhasil dihapus');
    }
}
