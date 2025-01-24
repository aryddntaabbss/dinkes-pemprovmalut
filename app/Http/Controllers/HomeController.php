<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Berita;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil data dari database
        $berita = Berita::paginate(6);
        $kategori = Kategori::all();

        // Kirim data ke view
        return view('pages.index', compact('berita', 'kategori'));
    }
}
