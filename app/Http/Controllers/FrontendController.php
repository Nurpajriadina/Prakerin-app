<?php

namespace App\Http\Controllers;

use App\Models\PajriaLowongan;
use Illuminate\Http\Request;

class FrontendLowonganController extends Controller
{
    public function index()
    {
        $lowongans = PajriaLowongan::with('perusahaan')->latest()->get();
        return view('frontend.lowongan.index', compact('lowongans'));
    }

    public function show($id)
    {
        $lowongan = PajriaLowongan::with('perusahaan')->findOrFail($id);
        return view('frontend.lowongan.show', compact('lowongan'));
    }
}
