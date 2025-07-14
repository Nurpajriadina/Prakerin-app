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
        return view('admin.pelamar.index', compact('pelamars'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,diterima,ditolak'
        ]);

        $pelamar = PajriaPelamarMagang::findOrFail($id);

        if ($request->status === 'ditolak') {
            $pelamar->delete();
            return redirect()->back()->with('success', 'Pelamar ditolak dan datanya telah dihapus.');
        }

        $pelamar->status = $request->status;
        $pelamar->save();

        return redirect()->back()->with('success', 'Status pelamar berhasil diperbarui.');
    }

    // Fungsi lainnya tetap
    public function create()
    {
        $users = User::all();
        $lowongans = PajriaLowongan::all();
        return view('admin.pelamar.create', compact('users', 'lowongans'));
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
        return redirect()->route('admin.pelamar.index')->with('success', 'Pelamar berhasil ditambahkan');
    }

    public function edit(PajriaPelamarMagang $pelamar)
    {
        $users = User::all();
        $lowongans = PajriaLowongan::all();
        return view('admin.pelamar.edit', compact('pelamar', 'users', 'lowongans'));
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
        return redirect()->route('admin.pelamar.index')->with('success', 'Pelamar berhasil diperbarui');
    }

    public function destroy(PajriaPelamarMagang $pelamar)
    {
        $pelamar->delete();
        return redirect()->route('admin.pelamar.index')->with('success', 'Pelamar berhasil dihapus');
    }

    // ============================
    // PENDAFTARAN MANUAL SISWA
    // ============================
    public function daftar()
    {
        $lowongans = PajriaLowongan::all();
        return view('admin.pelamar.daftar', compact('lowongans'));
    }

    public function daftarSimpan(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'no_hp' => 'required|string|max:20',
            'sekolah' => 'required|string|max:255',
            'lowongan_id' => 'required|exists:pajria_lowongans,id',
        ]);

        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt('default123'),
        ]);

        PajriaPelamarMagang::create([
            'user_id' => $user->id,
            'lowongan_id' => $request->lowongan_id,
            'tanggal_daftar' => now(),
            'status' => 'pending',
        ]);

        return redirect('/dashboard')->with('success', 'Pendaftaran berhasil dikirim!');
    }

    // ============================
    // DASHBOARD
    // ============================
    public function dashboard()
    {
        return view('admin.dashboard.index');
    }

    public function semua()
    {
        $pelamars = PajriaPelamarMagang::with(['user', 'lowongan'])->get();
        return view('admin.dashboard.semua', compact('pelamars'));
    }

    public function diterima()
    {
        $pelamars = PajriaPelamarMagang::with(['user', 'lowongan'])
            ->where('status', 'diterima')
            ->get();
        return view('admin.dashboard.diterima', compact('pelamars'));
    }
}
