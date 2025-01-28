<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DlLakip;
use Illuminate\Support\Facades\Storage;

class DlLakipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lakip = DlLakip::all();
        return view('dashboard.unduhan.lakip', compact('lakip'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lakip.create');
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

        // Menyimpan file
        if ($request->hasFile('file')) {
            // Menyimpan file di folder 'file' pada disk 'public'
            $filePath = $request->file('file')->store('file', 'public');
        }

        DlLakip::create([
            'nama' => $request->nama,
            'file_path' => $filePath,
        ]);

        return redirect()->route('dashboard.lakip.index')->with('success', 'Lakip berhasil ditambahkan.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lakip = DlLakip::findOrFail($id);
        Storage::delete($lakip->file_path);
        $lakip->delete();

        return redirect()->route('dashboard.lakip.index')->with('success', 'Lakip berhasil dihapus.');
    }
}
