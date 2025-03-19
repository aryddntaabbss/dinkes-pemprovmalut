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
use App\Models\Informasi;
use App\Models\ProfilPejabat;
use App\Models\StrukturOrganisasi;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil data berita dengan pagination
        $berita = Berita::paginate(4);
        $informasi = Informasi::paginate(4);

        // Ambil 5 berita terpopuler
        $beritaTerpopuler = Berita::where('up_berita', true)
            ->latest() // Menampilkan berita terbaru terlebih dahulu
            ->take(5) // Ambil 5 berita terpopuler
            ->get();

        // Ambil 5 informasi terpopuler
        $informasiTerpopuler = Informasi::where('up_informasi', true)
            ->latest() // Menampilkan informasi terbaru terlebih dahulu
            ->take(5) // Ambil 5 informasi terpopuler
            ->get();

        // Ambil kategori untuk sidebar jika diperlukan
        $kategori = Kategori::all();

        // Kirim data ke view
        return view('pages.index', [
            'berita' => $berita,
            'informasi' => $informasi,
            'beritaTerpopuler' => $beritaTerpopuler,
            'informasiTerpopuler' => $informasiTerpopuler,
            'kategori' => $kategori
        ]);
    }

    public function allinfo()
    {
        $informasi = Informasi::latest()->paginate(6); // Ambil informasi terbaru dengan pagination
        return view('pages.all-info', compact('informasi'));
    }

    public function blog($id)
    {
        // Ambil 5 berita terpopuler untuk blog
        $berita = Berita::findOrFail($id);
        $beritaTerpopuler = Berita::where('up_berita', true)
            ->latest()
            ->take(5)
            ->get();

        return view('pages.show', [
            'berita' => $berita,
            'beritaTerpopuler' => $beritaTerpopuler,
        ]);
    }

    public function info($id)
    {
        // Ambil informasi berdasarkan ID, jika tidak ditemukan akan error 404
        $informasi = Informasi::where('id', $id)->firstOrFail();

        // Ambil 5 informasi terpopuler yang memiliki flag "up_informasi" = true
        $informasiTerpopuler = Informasi::where('up_informasi', true)
            ->latest()
            ->take(5)
            ->get();

        return view('pages.info', compact('informasi', 'informasiTerpopuler'));
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

    public function pejabat(Request $request)
    {
        $selectedJabatan = $request->get('jabatan', 'all');
        $pejabat = ProfilPejabat::all();

        $pejabatTerpilih = ($selectedJabatan === 'all')
            ? $pejabat->first()
            : ProfilPejabat::where('jabatan', $selectedJabatan)->first();

        return view('pages.pejabat', compact('pejabat', 'pejabatTerpilih', 'selectedJabatan'));
    }

    public function struktur()
    {
        // Ambil semua data struktur organisasi
        $struktur = StrukturOrganisasi::first(); // Jika hanya satu data, gunakan first()

        // Kirim data ke view
        return view('pages.struktur-org', compact('struktur'));
    }
}
