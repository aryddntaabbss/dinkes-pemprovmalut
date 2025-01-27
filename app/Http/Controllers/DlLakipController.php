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

        $path = $request->file('file')->store('lakip');

        DlLakip::create([
            'nama' => $request->nama,
            'file_path' => $path,
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
