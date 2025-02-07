<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StrukturOrganisasi;
use Illuminate\Support\Facades\Storage;

class StrukturOrganisasiController extends Controller
{
    public function index()
    {
        $struktur = StrukturOrganisasi::all();
        return view('dashboard.struktur-org', compact('struktur'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $path = $request->file('image')->store('struktur_org', 'public');

        StrukturOrganisasi::create(['image' => $path]);

        return redirect()->back()->with('success', 'Gambar berhasil diunggah!');
    }

    public function destroy($id)
    {
        $image = StrukturOrganisasi::findOrFail($id);

        // Hapus file dari storage
        if ($image->image) {
            Storage::disk('public')->delete($image->image);
        }

        // Hapus data dari database
        $image->delete();

        return redirect()->back()->with('success', 'Gambar berhasil dihapus!');
    }
}
