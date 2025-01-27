<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DlRenstra;
use Illuminate\Support\Facades\Storage;

class DlRenstraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $renstra = DlRenstra::all();
        return view('dashboard.unduhan.renstra', compact('renstra'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('renstra.create');
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

        $path = $request->file('file')->store('renstra');

        DlRenstra::create([
            'nama' => $request->nama,
            'file_path' => $path,
        ]);

        return redirect()->route('dashboard.renstra.index')->with('success', 'Renstra berhasil ditambahkan.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $renstra = DlRenstra::findOrFail($id);
        Storage::delete($renstra->file_path);
        $renstra->delete();

        return redirect()->route('dashboard.renstra.index')->with('success', 'Renstra berhasil dihapus.');
    }
}
