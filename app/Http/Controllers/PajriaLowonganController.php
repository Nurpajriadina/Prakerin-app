<?php

namespace App\Http\Controllers;

use App\Models\PajriaLowongan;
use App\Models\PajriaPerusahaan;
use Illuminate\Http\Request;

class PajriaLowonganController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | FRONTEND / USER
    |--------------------------------------------------------------------------
    */
    public function indexFrontend()
    {
        $lowongans = PajriaLowongan::with('perusahaan')->get();
        return view('frontend.lowongan_user.index', compact('lowongans'));
    }

    public function showFrontend($id)
    {
        $lowongan = PajriaLowongan::with('perusahaan')->findOrFail($id);
        return view('frontend.lowongan_user.show', compact('lowongan'));
    }

    /*
    |--------------------------------------------------------------------------
    | ADMIN
    |--------------------------------------------------------------------------
    */
    public function indexAdmin()
    {
        $lowongans = PajriaLowongan::with('perusahaan')->get();
        return view('admin.lowongan.index', compact('lowongans'));
    }

    public function create()
    {
        $perusahaans = PajriaPerusahaan::all();
        return view('admin.lowongan.create', compact('perusahaans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'perusahaan_id' => 'required|exists:pajria_perusahaans,id',
            'judul' => 'required|string|max:255',
            'deskripsi_pekerjaan' => 'required|string',
            'lokasi_penempatan' => 'required|string',
            'rincian_penugasan' => 'required|string',
        ]);

        PajriaLowongan::create($request->all());
        return redirect()->route('admin.lowongan.index')->with('success', 'Lowongan berhasil ditambahkan');
    }

    public function edit(PajriaLowongan $lowongan)
    {
        $perusahaans = PajriaPerusahaan::all();
        return view('admin.lowongan.edit', compact('lowongan', 'perusahaans'));
    }

    public function update(Request $request, PajriaLowongan $lowongan)
    {
        $request->validate([
            'perusahaan_id' => 'required|exists:pajria_perusahaans,id',
            'judul' => 'required|string|max:255',
            'deskripsi_pekerjaan' => 'required|string',
            'lokasi_penempatan' => 'required|string',
            'rincian_penugasan' => 'required|string',
        ]);

        $lowongan->update($request->all());
        return redirect()->route('admin.lowongan.index')->with('success', 'Lowongan berhasil diperbarui');
    }

    public function destroy(PajriaLowongan $lowongan)
    {
        $lowongan->delete();
        return redirect()->route('admin.lowongan.index')->with('success', 'Lowongan berhasil dihapus');
    }
}
