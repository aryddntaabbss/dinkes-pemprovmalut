<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DlProdkes;
use Illuminate\Support\Facades\Storage;

class DlProdkesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prodKesehatan = DlProdkes::all();
        return view('dashboard.unduhan.prod-kesehatan', compact('prodKesehatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('prod-kesehatan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',  // Validasi nama produk
            'file' => 'required|file|mimes:pdf,doc,docx,txt|max:2048',  // Validasi format file
        ]);

        // Menyimpan file
        if ($request->hasFile('file')) {
            // Menyimpan file di folder 'file' pada disk 'public'
            $filePath = $request->file('file')->store('file', 'public');
        }

        // Membuat entri baru di database untuk produk kesehatan
        DlProdkes::create([
            'nama' => $request->nama,  // Menyimpan nama produk
            'file_path' => $filePath,  // Menyimpan path file
        ]);

        // Redirect ke halaman daftar produk kesehatan setelah berhasil
        return redirect()->route('dashboard.prod-kesehatan.index')->with('success', 'Produk kesehatan berhasil ditambahkan!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prodkes = DlProdkes::findOrFail($id);
        Storage::delete($prodkes->file_path);
        $prodkes->delete();

        return redirect()->route('dashboard.prod-kesehatan.index')->with('success', 'Produk kesehatan berhasil dihapus.');
    }
}
