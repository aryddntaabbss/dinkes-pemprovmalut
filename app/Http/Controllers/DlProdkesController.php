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
        $request->validate([
            'nama' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf,doc,docx,txt|max:2048',
        ]);

        $path = $request->file('file')->store('prodkes');

        DlProdkes::create([
            'nama' => $request->nama,
            'file_path' => $path,
        ]);

        return redirect()->route('dashboard.prod-kesehatan.index')->with('success', 'Produk kesehatan berhasil ditambahkan.');
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
