<?php

namespace App\Http\Controllers;

use App\Models\PajriaLowongan;
use App\Models\PajriaPerusahaan;
use Illuminate\Http\Request;

class PajriaLowonganController extends Controller
{
    public function index()
    {
        $lowongans = PajriaLowongan::with('perusahaan')->get();
        return view('lowongan.index', compact('lowongans'));
    }

    public function create()
    {
        $perusahaans = PajriaPerusahaan::all();
        return view('lowongan.create', compact('perusahaans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'perusahaan_id' => 'required|exists:pajria_perusahaans,id',
            'judul' => 'required',
            'deskripsi' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        PajriaLowongan::create($request->all());

        return redirect()->route('lowongan.index')->with('success', 'Lowongan berhasil ditambahkan');
    }

    public function show(PajriaLowongan $lowongan)
    {
        return view('lowongan.show', compact('lowongan'));
    }

    public function edit(PajriaLowongan $lowongan)
    {
        $perusahaans = PajriaPerusahaan::all();
        return view('lowongan.edit', compact('lowongan', 'perusahaans'));
    }

    public function update(Request $request, PajriaLowongan $lowongan)
    {
        $request->validate([
            'perusahaan_id' => 'required|exists:pajria_perusahaans,id',
            'judul' => 'required',
            'deskripsi' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        $lowongan->update($request->all());

        return redirect()->route('lowongan.index')->with('success', 'Lowongan berhasil diperbarui');
    }

    public function destroy(PajriaLowongan $lowongan)
    {
        $lowongan->delete();
        return redirect()->route('lowongan.index')->with('success', 'Lowongan berhasil dihapus');
    }
}
