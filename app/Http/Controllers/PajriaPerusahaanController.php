<?php

namespace App\Http\Controllers;

use App\Models\PajriaPerusahaan;
use Illuminate\Http\Request;

class PajriaPerusahaanController extends Controller
{
    public function index()
    {
        $perusahaans = PajriaPerusahaan::all();
        return view('perusahaan.index', compact('perusahaans'));
    }

    public function create()
    {
        return view('perusahaan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required|email',
            'no_telepon' => 'required',
        ]);

        PajriaPerusahaan::create($request->all());

        return redirect()->route('perusahaan.index')->with('success', 'Data perusahaan berhasil ditambahkan');
    }

    public function show(PajriaPerusahaan $perusahaan)
    {
        return view('perusahaan.show', compact('perusahaan'));
    }

    public function edit(PajriaPerusahaan $perusahaan)
    {
        return view('perusahaan.edit', compact('perusahaan'));
    }

    public function update(Request $request, PajriaPerusahaan $perusahaan)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required|email',
            'no_telepon' => 'required',
        ]);

        $perusahaan->update($request->all());

        return redirect()->route('perusahaan.index')->with('success', 'Data perusahaan berhasil diperbarui');
    }

    public function destroy(PajriaPerusahaan $perusahaan)
    {
        $perusahaan->delete();
        return redirect()->route('perusahaan.index')->with('success', 'Data perusahaan berhasil dihapus');
    }
}
