<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
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
    public function daftar(Request $request)
    {
        $lowonganId = $request->query('lowongan_id');

        if ($lowonganId) {
            $lowongan = PajriaLowongan::findOrFail($lowonganId);
            return view('frontend.pelamar.index', compact('lowongan'));
        } else {
            $lowongans = PajriaLowongan::all();
            return view('frontend.pelamar.index', compact('lowongans'));
        }
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

        return redirect()->route('pelamar.daftar')->with('success', 'Pendaftaran berhasil dikirim!');
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

    // ============================
    // DATA USER YANG MELAMAR
    // ============================
    public function pelamarUser()
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $user = auth()->user(); // ini sudah aman karena sebelumnya di-check

        $pelamars = PajriaPelamarMagang::with('lowongan')
            ->where('user_id', $user->id)
            ->latest()
            ->get();

        return view('frontend.pelamar.index', compact('pelamars'));
    }
}
