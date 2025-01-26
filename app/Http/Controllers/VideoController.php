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
            'video' => 'required|mimes:mp4,avi,mov,wmv|max:100000', // Validasi file video
            'title' => 'required|string|max:255',
        ]);

        // Menyimpan video
        $videoPath = $request->file('video')->store('videos', 'public');

        // Membuat entri video baru di database
        Video::create([
            'title' => $request->title,
            'video_path' => $videoPath,
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
