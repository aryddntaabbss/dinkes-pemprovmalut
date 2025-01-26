<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InformasiController extends Controller
{
    // Menampilkan daftar halaman informasi
    public function index()
    {
        return view('dashboard.set-informasi.pages', [
            'informasi' => Informasi::latest()->get()
        ]);
    }

    // Menampilkan halaman informasi berdasarkan slug
    public function show(Informasi $informasi)
    {
        return view('pages.blank', compact('informasi'));
    }

    // Menampilkan form untuk membuat halaman informasi baru
    public function create()
    {
        return view('dashboard.set-informasi.create');
    }

    // Menyimpan informasi baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:informasi,slug|regex:/^[a-z0-9-]+$/',
            'content' => 'required|string',
            'status' => 'required|in:aktif,tidak',
        ]);

        // Membuat slug tanpa domain
        $validatedData['slug'] = Str::slug($request->input('slug'));

        Informasi::create($validatedData);

        return redirect()->route('informasi.index')->with('success', 'Halaman informasi berhasil ditambahkan.');
    }

    // Mengupdate halaman informasi
    public function update(Request $request, $slug)
    {
        $informasi = Informasi::where('slug', $slug)->firstOrFail();

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:informasi,slug,' . $informasi->id,
            'content' => 'required|string',
            'status' => 'required|in:aktif,tidak',
        ]);

        $informasi->update($validatedData);

        return redirect()->route('informasi.index')->with('success', 'Halaman informasi berhasil diperbarui!');
    }

    // Menampilkan form untuk mengedit halaman informasi
    public function edit($id)
    {
        $informasi = Informasi::findOrFail($id);
        return view('dashboard.set-informasi.edit', compact('informasi'));
    }

    // Menghapus halaman informasi
    public function destroy($id)
    {
        $informasi = Informasi::findOrFail($id);
        $informasi->delete();

        return redirect()->route('informasi.index')->with('success', 'Halaman informasi berhasil dihapus');
    }
}
