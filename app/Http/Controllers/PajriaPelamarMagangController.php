<?php

namespace App\Http\Controllers;

use App\Models\PajriaPelamarMagang;
use App\Models\PajriaLowongan;
use App\Models\User;
use Illuminate\Http\Request;

class PajriaPelamarMagangController extends Controller
{
    public function index()
    {
        $pelamars = PajriaPelamarMagang::with(['user', 'lowongan'])->get();
        return view('pelamar.index', compact('pelamars'));
    }

    public function create()
    {
        $users = User::all();
        $lowongans = PajriaLowongan::all();
        return view('pelamar.create', compact('users', 'lowongans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'lowongan_id' => 'required|exists:pajria_lowongans,id',
            'tanggal_daftar' => 'required|date',
            'status' => 'required|in:pending,diterima,ditolak',
        ]);

        PajriaPelamarMagang::create($request->all());

        return redirect()->route('pelamar.index')->with('success', 'Pelamar berhasil ditambahkan');
    }

    public function show(PajriaPelamarMagang $pelamar)
    {
        return view('pelamar.show', compact('pelamar'));
    }

    public function edit(PajriaPelamarMagang $pelamar)
    {
        $users = User::all();
        $lowongans = PajriaLowongan::all();
        return view('pelamar.edit', compact('pelamar', 'users', 'lowongans'));
    }

    public function update(Request $request, PajriaPelamarMagang $pelamar)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'lowongan_id' => 'required|exists:pajria_lowongans,id',
            'tanggal_daftar' => 'required|date',
            'status' => 'required|in:pending,diterima,ditolak',
        ]);

        $pelamar->update($request->all());

        return redirect()->route('pelamar.index')->with('success', 'Pelamar berhasil diperbarui');
    }

    public function destroy(PajriaPelamarMagang $pelamar)
    {
        $pelamar->delete();
        return redirect()->route('pelamar.index')->with('success', 'Pelamar berhasil dihapus');
    }
}
