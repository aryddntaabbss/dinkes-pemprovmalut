<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Berita;
use App\Models\Galeri;

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

    public function blog()
    {
        $beritaTerpopuler = Berita::where('up_berita', true)
            ->latest()
            ->take(5)
            ->get();

        return view('pages.show', [
            'beritaTerpopuler' => $beritaTerpopuler,
        ]);
    }

    public function galeri(Request $request)
    {
        // Dapatkan kategori yang diminta
        $selectedCategory = $request->get('category', 'all');

        // Ambil semua kategori unik dari tabel galeri
        $categories = Galeri::select('category')->distinct()->pluck('category')->toArray();

        // Filter gambar berdasarkan kategori
        $images = ($selectedCategory === 'all')
            ? Galeri::all()
            : Galeri::where('category', $selectedCategory)->get();

        // Cek apakah request berasal dari admin atau user umum
        if ($request->is('dashboard/*')) {
            // Untuk admin (folder dashboard)
            return view('dashboard.ragam.foto', compact('categories', 'images', 'selectedCategory'));
        } else {
            // Untuk user umum (folder pages)
            return view('pages.ragam.foto', compact('categories', 'images', 'selectedCategory'));
        }
    }
}
