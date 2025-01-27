<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Video;
use App\Models\DlProdkes;
use App\Models\DlProfkes;
use App\Models\DlRenstra;
use App\Models\DlLakip;
use App\Models\DlDocLainx;

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
        // Ambil 5 berita terpopuler untuk blog
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

        // Kirim data galeri ke view untuk user umum
        return view('pages.ragam.foto', compact('categories', 'images', 'selectedCategory'));
    }

    public function video(Request $request)
    {
        $videos = Video::all();  // Ambil semua data video
        return view('pages.ragam.vidio', compact('videos'));
    }

    public function prodKes()
    {
        $prodKesehatan = DlProdkes::all();
        return view('pages.unduhan.prod-kesehatan', compact('prodKesehatan'));
    }

    public function profKes()
    {
        $profKesehatan = DlProfkes::all();
        return view('pages.unduhan.prof-kesehatan', compact('profKesehatan'));
    }

    public function renstra()
    {
        $renstra = DlRenstra::all();
        return view('pages.unduhan.renstra', compact('renstra'));
    }

    public function lakip()
    {
        $lakip = DlLakip::all();
        return view('pages.unduhan.lakip', compact('lakip'));
    }

    public function docLainx()
    {
        $docLainx = DlDocLainx::all();
        return view('pages.unduhan.doc-lainx', compact('docLainx'));
    }
}
