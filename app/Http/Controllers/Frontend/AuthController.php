<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Tampilkan form login.
     */
    public function showLoginForm()
    {
        return view('frontend.auth.login');
    }

    /**
     * Proses login user (admin & user biasa).
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Regenerate session agar aman setelah login
            $request->session()->regenerate();

            if ($user->level === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->level === 'user') {
                return redirect()->route('frontend.beranda');
            }

            // Jika level tidak dikenali
            Auth::logout();
            return redirect()->route('login')->withErrors([
                'email' => 'Level pengguna tidak dikenali.'
            ]);
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput();
    }

    /**
     * Tampilkan form registrasi user.
     */
    public function showRegisterForm()
    {
        return view('frontend.auth.register');
    }

    /**
     * Proses registrasi user baru.
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'level' => 'user',
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('frontend.beranda');
    }

    /**
     * Logout user dan redirect ke beranda.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('frontend.beranda'); // sebelumnya salah arah ke "dashboard"
    }
}
