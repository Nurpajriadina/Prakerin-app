<?php

namespace App\Http\Controllers;

use App\Models\PajriaPerusahaan;
use Illuminate\Http\Request;

class PajriaPerusahaanController extends Controller
{
    // =========================
    // ADMIN AREA
    // =========================
    public function index()
    {
        $perusahaans = PajriaPerusahaan::all();
        return view('admin.perusahaan.index', compact('perusahaans'));
    }

    public function create()
    {
        return view('admin.perusahaan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required|email',
            'no_telepon' => 'required',
            'tentang' => 'required',
            'kontak_nama' => 'nullable',
            'kontak_email' => 'nullable|email',
            'kontak_alamat' => 'nullable',
            'logo' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }

        PajriaPerusahaan::create($data);

        return redirect()->route('admin.perusahaan.index')->with('success', 'Data perusahaan berhasil ditambahkan');
    }

    public function show(PajriaPerusahaan $perusahaan)
    {
        return view('admin.perusahaan.show', compact('perusahaan'));
    }

    public function edit(PajriaPerusahaan $perusahaan)
    {
        return view('admin.perusahaan.edit', compact('perusahaan'));
    }

    public function update(Request $request, PajriaPerusahaan $perusahaan)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required|email',
            'no_telepon' => 'required',
            'tentang' => 'required',
            'kontak_nama' => 'nullable',
            'kontak_email' => 'nullable|email',
            'kontak_alamat' => 'nullable',
            'logo' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $perusahaan->update($data);

        return redirect()->route('admin.perusahaan.index')->with('success', 'Data perusahaan berhasil diperbarui');
    }

    public function destroy(PajriaPerusahaan $perusahaan)
    {
        $perusahaan->delete();
        return redirect()->route('admin.perusahaan.index')->with('success', 'Data perusahaan berhasil dihapus');
    }

    // =========================
    // FRONTEND USER AREA
    // =========================
    public function indexFrontend()
    {
        $perusahaans = PajriaPerusahaan::all();
        return view('frontend.perusahaan_user.index', compact('perusahaans'));
    }

    public function showFrontend($id)
    {
        $perusahaan = PajriaPerusahaan::with('lowongans')->findOrFail($id);
        return view('frontend.perusahaan_user.show', compact('perusahaan'));
    }
}
