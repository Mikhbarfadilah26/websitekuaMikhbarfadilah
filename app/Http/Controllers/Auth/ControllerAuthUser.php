<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllerAuthUser
{
    /**
     * Halaman Login
     */
    public function index()
    {
        return view('auth.loginuser');
    }

    /**
     * Proses Login
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (!Auth::attempt($credentials)) {
            return back()
                ->withErrors([
                    'email' => 'Email atau password salah.',
                ])
                ->onlyInput('email');
        }

        // Regenerasi session setelah berhasil login
        $request->session()->regenerate();

        $user = Auth::user();

        /*
        |--------------------------------------------------------------------------
        | ADMIN
        |--------------------------------------------------------------------------
        */
        if ($user->role === 'admin') {
            return redirect()
                ->route('admin.dashboard')
                ->with('success', 'Selamat datang, ' . $user->nama . '!');
        }

        /*
        |--------------------------------------------------------------------------
        | MASYARAKAT
        |--------------------------------------------------------------------------
        */
        if ($user->role === 'masyarakat') {
            return redirect()
                ->route('masyarakat.dashboard')
                ->with('success', 'Selamat datang, ' . $user->nama . '!');
        }

        /*
        |--------------------------------------------------------------------------
        | ROLE TIDAK DIKENALI
        |--------------------------------------------------------------------------
        */
        Auth::logout();

        return back()->withErrors([
            'email' => 'Role akun tidak dikenali.',
        ]);
    }

    /**
     * Logout
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('login')
            ->with('success', 'Berhasil keluar dari akun.');
    }
}
