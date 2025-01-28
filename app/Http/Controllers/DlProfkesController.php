<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DlProfkes;
use Illuminate\Support\Facades\Storage;

class DlProfkesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profKesehatan = DlProfkes::all();
        return view('dashboard.unduhan.prof-kesehatan', compact('profKesehatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('prof-kesehatan.create');
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

        DlProfkes::create([
            'nama' => $request->nama,
            'file_path' => $filePath,
        ]);

        return redirect()->route('dashboard.prof-kesehatan.index')->with('success', 'Profil Kesehatan berhasil ditambahkan.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profkes = DlProfkes::findOrFail($id);
        Storage::delete($profkes->file_path);
        $profkes->delete();

        return redirect()->route('dashboard.prof-kesehatan.index')->with('success', 'Profil Kesehatan berhasil dihapus.');
    }
}
