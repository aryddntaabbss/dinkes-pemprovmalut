<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProfilController extends Controller
{
    // Menampilkan daftar halaman
    public function index()
    {
        return view('dashboard.set-profil.pages', [
            'profil' => Profil::latest()->get()
        ]);
    }

    // Menampilkan halaman berdasarkan slug
    public function show(Profil $profil)
    {
        return view('pages.blank', compact('profil'));
    }

    // Menampilkan form untuk membuat halaman baru
    public function create()
    {
        return view('dashboard.set-profil.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:profil,slug|regex:/^[a-z0-9-]+$/',
            'content' => 'required|string',
            'status' => 'required|in:aktif,tidak',
        ]);

        // Membuat slug tanpa domain
        $validatedData['slug'] = Str::slug($request->input('slug'));

        Profil::create($validatedData);

        return redirect()->route('profil.index')->with('success', 'Halaman berhasil ditambahkan.');  // Perbaiki di sini
    }

    public function update(Request $request, $slug)
    {
        $profil = Profil::where('slug', $slug)->firstOrFail();

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:profil,slug,' . $profil->id,
            'content' => 'required|string',
            'status' => 'required|in:aktif,tidak',
        ]);

        $profil->update($validatedData);

        return redirect()->route('profil.index')->with('success', 'Halaman berhasil diperbarui!');  // Perbaiki di sini
    }

    // Menampilkan form untuk mengedit halaman
    public function edit($id)
    {
        $profil = Profil::findOrFail($id);
        return view('dashboard.set-profil.edit', compact('profil'));
    }

    // Menghapus halaman
    public function destroy($id)
    {
        $profil = Profil::findOrFail($id);
        $profil->delete();

        return redirect()->route('profil.index')->with('success', 'Halaman berhasil dihapus');  // Perbaiki di sini
    }
}
