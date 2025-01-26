<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index()
    {
        $galeri = Galeri::all(); // Ambil semua data galeri
        return view('dashboard.ragam.foto', compact('galeri'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:10048',
            'category' => 'required|string|max:255',
        ]);

        try {
            // Simpan file gambar ke direktori 'public/galeri'
            $imagePath = $request->file('image')->store('galeri', 'public');

            // Simpan data ke database
            Galeri::create([
                'image_path' => $imagePath,
                'category' => $request->category,
            ]);

            return redirect()->route('dashboard.galeri.index')->with('success', 'Foto berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->route('dashboard.galeri.index')->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }



    public function destroy($id)
    {
        try {
            $galeri = Galeri::findOrFail($id);

            // Hapus file gambar dari storage 'public/galeri'
            if (Storage::disk('public')->exists($galeri->image_path)) {
                Storage::disk('public')->delete($galeri->image_path);
            }

            // Hapus data dari database
            $galeri->delete();

            return redirect()->route('dashboard.galeri.index')->with('success', 'Foto berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('dashboard.galeri.index')->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
