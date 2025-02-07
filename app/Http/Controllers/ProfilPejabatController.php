<?php

namespace App\Http\Controllers;

use App\Models\ProfilPejabat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Tambahkan ini untuk handle storage

class ProfilPejabatController extends Controller
{
    public function index()
    {
        $pejabat = ProfilPejabat::latest()->get(); // Tambahkan latest() untuk sorting terbaru
        return view('dashboard.pejabat.index', compact('pejabat'));
    }

    public function create()
    {
        return view('dashboard.pejabat.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'jabatan' => 'required|string|max:255',
            'nama_pejabat' => 'required|string|max:255',
            'pangkat_golongan' => 'required|string|max:255',
            'nip' => 'required|numeric|unique:profil_pejabat',
            'pendidikan' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048' // Ubah menjadi required
        ]);

        // Handle file upload
        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('pejabat', 'public');
        }

        ProfilPejabat::create($validated);

        return redirect()->route('profil-pejabat.index')
            ->with('success', 'Data pejabat berhasil ditambahkan');
    }

    public function edit(ProfilPejabat $pejabat)
    {
        return view('dashboard.pejabat.edit', compact('pejabat'));
    }

    public function update(Request $request, ProfilPejabat $pejabat)
    {
        $validated = $request->validate([
            'jabatan' => 'required|string|max:255',
            'nama_pejabat' => 'required|string|max:255',
            'pangkat_golongan' => 'required|string|max:255',
            'nip' => 'required|numeric|unique:profil_pejabat,nip,' . $pejabat->id,
            'pendidikan' => 'required|string|max:255',
            'foto' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle file upload jika ada foto baru
        if ($request->hasFile('foto')) {
            // Hapus foto lama
            if ($pejabat->foto) {
                Storage::disk('public')->delete($pejabat->foto);
            }
            // Simpan foto baru
            $validated['foto'] = $request->file('foto')->store('pejabat', 'public');
        }

        $pejabat->update($validated);

        return redirect()->route('profil-pejabat.index')
            ->with('success', 'Data pejabat berhasil diperbarui');
    }

    public function destroy(ProfilPejabat $pejabat)
    {
        // Hapus file foto sebelum hapus data
        if ($pejabat->foto) {
            Storage::disk('public')->delete($pejabat->foto);
        }

        $pejabat->delete();

        return redirect()->route('profil-pejabat.index')
            ->with('success', 'Data pejabat berhasil dihapus');
    }
}
