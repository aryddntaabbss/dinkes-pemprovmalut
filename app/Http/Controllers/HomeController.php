<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Berita;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil data berita dengan pagination
        $berita = Berita::paginate(4);

        // Ambil 5 berita terpopuler
        $beritaTerpopuler = Berita::where('up_berita', true)
            ->latest() // Menampilkan berita terbaru terlebih dahulu
            ->take(5) // Ambil 5 berita terpopuler
            ->get();

        // Ambil kategori untuk sidebar jika diperlukan
        $kategori = Kategori::all();

        // Kirim data ke view
        return view('pages.index', [
            'berita' => $berita,
            'beritaTerpopuler' => $beritaTerpopuler,
            'kategori' => $kategori
        ]);
    }
}
