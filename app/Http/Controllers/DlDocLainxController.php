<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DlDocLainx;
use Illuminate\Support\Facades\Storage;

class DlDocLainxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docLainx = DlDocLainx::all();
        return view('dashboard.unduhan.doc-lainx', compact('docLainx'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doc-lainx.create');
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

        DlDocLainx::create([
            'nama' => $request->nama,
            'file_path' => $filePath,
        ]);

        return redirect()->route('dashboard.doc-lainx.index')->with('success', 'Dokumen berhasil ditambahkan.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $docLainx = DlDocLainx::findOrFail($id);
        Storage::delete($docLainx->file_path);
        $docLainx->delete();

        return redirect()->route('dashboard.doc-lainx.index')->with('success', 'Dokumen berhasil dihapus.');
    }
}
