<?php

namespace App\Http\Controllers;

use App\Models\DtaKesehatan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DtaKesehatanController extends Controller
{
    // Menampilkan daftar halaman data kesehatan
    public function index()
    {
        return view('dashboard.data-kesehatan.pages', [
            'dtakesehatan' => DtaKesehatan::latest()->get()
        ]);
    }

    // Menampilkan halaman data kesehatan berdasarkan slug
    public function show(DtaKesehatan $dtakesehatan)
    {
        return view('pages.blank', compact('dtakesehatan'));
    }

    // Menampilkan form untuk membuat halaman data kesehatan baru
    public function create()
    {
        return view('dashboard.data-kesehatan.create');
    }

    // Menyimpan dtakesehatan baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:dtakesehatan,slug|regex:/^[a-z0-9-]+$/',
            'content' => 'required|string',
            'status' => 'required|in:aktif,tidak',
        ]);

        // Membuat slug tanpa domain
        $validatedData['slug'] = Str::slug($request->input('slug'));

        DtaKesehatan::create($validatedData);

        return redirect()->route('data-kesehatan.index')->with('success', 'Halaman data kesehatan berhasil ditambahkan.');
    }

    // Mengupdate halaman data kesehatan
    public function update(Request $request, $slug)
    {
        $dtakesehatan = DtaKesehatan::where('slug', $slug)->firstOrFail();

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:dtakesehatan,slug,' . $dtakesehatan->id,
            'content' => 'required|string',
            'status' => 'required|in:aktif,tidak',
        ]);

        $dtakesehatan->update($validatedData);

        return redirect()->route('data-kesehatan.index')->with('success', 'Halaman data kesehatan berhasil diperbarui!');
    }

    // Menampilkan form untuk mengedit halaman data kesehatan
    public function edit($id)
    {
        $dtakesehatan = DtaKesehatan::findOrFail($id);
        return view('dashboard.data-kesehatan.edit', compact('dtakesehatan'));
    }

    // Menghapus halaman data kesehatan
    public function destroy($id)
    {
        $dtakesehatan = DtaKesehatan::findOrFail($id);
        $dtakesehatan->delete();

        return redirect()->route('data-kesehatan.index')->with('success', 'Halaman data kesehatan berhasil dihapus');
    }
}
