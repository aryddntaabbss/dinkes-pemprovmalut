<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InformasiController extends Controller
{
    public function index()
    {
        // Fetch all informasi with category relationships
        $informasi = Informasi::with('kategori')->get();

        // Return the view with informasi data
        return view('dashboard.informasi.index', compact('informasi'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('dashboard.informasi.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        // Validate incoming request
        $validated = $request->validate([
            'judul' => 'required|max:255',
            'konten' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:30048',
            'ket_gambar' => 'required|max:255',
            'kategori_id' => 'required|exists:kategori,id',
            'up_informasi' => 'nullable|boolean',
        ]);

        // Handle image upload if it exists
        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('informasi', 'public');
        }

        // Create informasi entry in the database
        Informasi::create([
            'judul' => $request->judul,
            'konten' => $request->konten,
            'gambar' => $gambarPath,
            'ket_gambar' => $request->ket_gambar,
            'kategori_id' => $request->kategori_id,
            'penulis' => $request->penulis,
            'up_informasi' => $request->up_informasi ?? false, // Default to false if not provided
        ]);

        return redirect()->route('informasi.index')->with('success', 'Informasi berhasil ditambahkan.');
    }

    public function edit(Informasi $informasi)
    {
        $kategori = Kategori::all();
        return view('dashboard.informasi.edit', compact('informasi', 'kategori'));
    }

    public function update(Request $request, Informasi $informasi)
    {
        // Validate incoming request
        $validated = $request->validate([
            'judul' => 'required|max:255',
            'konten' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:30048',
            'ket_gambar' => 'required|max:255',
            'kategori_id' => 'required|exists:kategori,id',
            'up_informasi' => 'nullable|boolean',
        ]);

        // Handle image update if a new image is uploaded
        if ($request->hasFile('gambar')) {
            // Delete the old image if it exists
            if ($informasi->gambar) {
                Storage::delete('public/' . $informasi->gambar);
            }

            // Store new image
            $gambarPath = $request->file('gambar')->store('informasi', 'public');
            $informasi->gambar = $gambarPath;
        }

        // Update the informasi record with new data
        $informasi->update([
            'judul' => $request->judul,
            'konten' => $request->konten,
            'ket_gambar' => $request->ket_gambar,
            'kategori_id' => $request->kategori_id,
            'penulis' => $request->penulis,
            'up_informasi' => $request->up_informasi ?? false, // Default to false if not provided
        ]);

        return redirect()->route('informasi.index')->with('success', 'Informasi berhasil diperbarui.');
    }

    public function destroy(Informasi $informasi)
    {
        // Delete the image if it exists
        if ($informasi->gambar) {
            Storage::delete('public/' . $informasi->gambar);
        }

        // Delete the informasi record
        $informasi->delete();

        return redirect()->route('informasi.index')->with('success', 'Informasi berhasil dihapus.');
    }

    public function show($id)
    {
        $informasi = Informasi::findOrFail($id);
        $informasiTerpopuler = Informasi::where('up_informasi', true)
            ->latest()
            ->take(5)
            ->get();

        return view('pages.show', [
            'informasi' => $informasi,
            'informasiTerpopuler' => $informasiTerpopuler,
        ]);
    }

    public function updateUp(Request $request, Informasi $informasi)
    {
        // Toggle the up_informasi status
        $informasi->up_informasi = !$informasi->up_informasi;
        $informasi->save();

        return redirect()->route('informasi.index')->with('success', 'Status up informasi berhasil diperbarui.');
    }
}
