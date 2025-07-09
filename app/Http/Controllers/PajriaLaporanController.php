<?php

namespace App\Http\Controllers;

use App\Models\PajriaLaporan;
use App\Models\PajriaPelamarMagang;
use Illuminate\Http\Request;

class PajriaLaporanController extends Controller
{
    public function index()
    {
        $laporans = PajriaLaporan::with('pelamar')->get();
        return view('laporan.index', compact('laporans'));
    }

    public function create()
    {
        $pelamars = PajriaPelamarMagang::all();
        return view('laporan.create', compact('pelamars'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pelamar_id' => 'required|exists:pajria_pelamar_magang,id',
            'isi_laporan' => 'required',
            'tanggal' => 'required|date',
        ]);

        PajriaLaporan::create($request->all());

        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil ditambahkan');
    }

    public function show(PajriaLaporan $laporan)
    {
        return view('laporan.show', compact('laporan'));
    }

    public function edit(PajriaLaporan $laporan)
    {
        $pelamars = PajriaPelamarMagang::all();
        return view('laporan.edit', compact('laporan', 'pelamars'));
    }

    public function update(Request $request, PajriaLaporan $laporan)
    {
        $request->validate([
            'pelamar_id' => 'required|exists:pajria_pelamar_magang,id',
            'isi_laporan' => 'required',
            'tanggal' => 'required|date',
        ]);

        $laporan->update($request->all());

        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil diperbarui');
    }

    public function destroy(PajriaLaporan $laporan)
    {
        $laporan->delete();
        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil dihapus');
    }
}
