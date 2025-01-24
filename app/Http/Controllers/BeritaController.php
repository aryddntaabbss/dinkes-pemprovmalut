<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * Menampilkan daftar berita.
     */
    public function index()
    {
        // Mengambil semua berita dengan relasi kategori
        $berita = Berita::with('kategori')->get(); // Menggunakan get() untuk mengambil semua berita

        // Mengirim data berita ke view
        return view('dashboard.berita.index', compact('berita'));
    }


    /**
     * Menampilkan form untuk membuat berita baru.
     */
    public function create()
    {
        $kategori = Kategori::all(); // Mengambil semua kategori
        return view('dashboard.berita.create', compact('kategori'));
    }

    /**
     * Menyimpan berita baru ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|max:255',
            'konten' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:30048',
            'kategori_id' => 'required|exists:kategori,id',
        ]);

        // Upload gambar jika ada
        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('berita', 'public');
        }

        Berita::create([
            'judul' => $request->judul,
            'konten' => $request->konten,
            'gambar' => $gambarPath,
            'kategori_id' => $request->kategori_id,
        ]);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit berita.
     */
    public function edit(Berita $berita)
    {
        $kategori = Kategori::all();
        return view('dashboard.berita.edit', compact('berita', 'kategori'));
    }

    /**
     * Memperbarui berita di database.
     */
    public function update(Request $request, Berita $berita)
    {
        $validated = $request->validate([
            'judul' => 'required|max:255',
            'konten' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:30048',
            'kategori_id' => 'required|exists:kategori,id',
        ]);

        // Update gambar jika ada
        if ($request->hasFile('gambar')) {
            if ($berita->gambar) {
                \Storage::delete('public/' . $berita->gambar);
            }
            $gambarPath = $request->file('gambar')->store('berita', 'public');
            $berita->gambar = $gambarPath;
        }

        $berita->update([
            'judul' => $request->judul,
            'konten' => $request->konten,
            'kategori_id' => $request->kategori_id,
        ]);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    /**
     * Menghapus berita dari database.
     */
    public function destroy(Berita $berita)
    {
        if ($berita->gambar) {
            \Storage::delete('public/' . $berita->gambar);
        }

        $berita->delete();
        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus.');
    }

    public function show(Berita $berita)
    {
        return view('dashboard.berita.show', compact('berita'));
    }
}
