<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
        // Fetch all berita with category relationships
        $berita = Berita::with('kategori')->get();

        // Return the view with berita data
        return view('dashboard.berita.index', compact('berita'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('dashboard.berita.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        // Validate incoming request
        $validated = $request->validate([
            'judul' => 'required|max:255',
            'konten' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:30048',
            'kategori_id' => 'required|exists:kategori,id',
            'penulis' => 'nullable|string|max:255',
            'up_berita' => 'nullable|boolean',
        ]);

        // Handle image upload if it exists
        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('berita', 'public');
        }

        // Create berita entry in the database
        Berita::create([
            'judul' => $request->judul,
            'konten' => $request->konten,
            'gambar' => $gambarPath,
            'kategori_id' => $request->kategori_id,
            'penulis' => $request->penulis,
            'up_berita' => $request->up_berita ?? false, // Default to false if not provided
        ]);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit(Berita $berita)
    {
        $kategori = Kategori::all();
        return view('dashboard.berita.edit', compact('berita', 'kategori'));
    }

    public function update(Request $request, Berita $berita)
    {
        // Validate incoming request
        $validated = $request->validate([
            'judul' => 'required|max:255',
            'konten' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:30048',
            'kategori_id' => 'required|exists:kategori,id',
            'penulis' => 'nullable|string|max:255',
            'up_berita' => 'nullable|boolean',
        ]);

        // Handle image update if a new image is uploaded
        if ($request->hasFile('gambar')) {
            // Delete the old image if it exists
            if ($berita->gambar) {
                Storage::delete('public/' . $berita->gambar);
            }

            // Store new image
            $gambarPath = $request->file('gambar')->store('berita', 'public');
            $berita->gambar = $gambarPath;
        }

        // Update the berita record with new data
        $berita->update([
            'judul' => $request->judul,
            'konten' => $request->konten,
            'kategori_id' => $request->kategori_id,
            'penulis' => $request->penulis,
            'up_berita' => $request->up_berita ?? false, // Default to false if not provided
        ]);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(Berita $berita)
    {
        // Delete the image if it exists
        if ($berita->gambar) {
            Storage::delete('public/' . $berita->gambar);
        }

        // Delete the berita record
        $berita->delete();

        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus.');
    }

    public function show($id)
    {
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

    public function updateUp(Request $request, Berita $berita)
    {
        // Toggle the up_berita status
        $berita->up_berita = !$berita->up_berita;
        $berita->save();

        return redirect()->route('berita.index')->with('success', 'Status up berita berhasil diperbarui.');
    }
}
