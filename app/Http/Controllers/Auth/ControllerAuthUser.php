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

        /*
        |--------------------------------------------------------------------------
        | CEK LOGIN
        |--------------------------------------------------------------------------
        */

        if (!Auth::attempt($credentials)) {
            return back()
                ->withErrors([
                    'email' => 'Email atau password salah.',
                ])
                ->onlyInput('email');
        }

        /*
        |--------------------------------------------------------------------------
        | REGENERASI SESSION
        |--------------------------------------------------------------------------
        */

        $request->session()->regenerate();

        $user = Auth::user();

        /*
        |--------------------------------------------------------------------------
        | ADMIN
        |--------------------------------------------------------------------------
        */

        if ($user->role === 'admin') {

            return redirect()
                ->intended(
                    route('admin.dashboard')
                )
                ->with(
                    'success',
                    'Selamat datang, ' . $user->nama . '!'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | MASYARAKAT
        |--------------------------------------------------------------------------
        */

        if ($user->role === 'masyarakat') {

            /*
            |--------------------------------------------------------------------------
            | CEK STATUS AKUN MASYARAKAT
            |--------------------------------------------------------------------------
            |
            | Hanya masyarakat dengan status "disetujui"
            | yang diperbolehkan masuk ke sistem.
            |
            */

            if ($user->status !== 'disetujui') {

                Auth::logout();

                $request->session()->invalidate();

                $request->session()->regenerateToken();

                if ($user->status === 'pending') {

                    return back()
                        ->withErrors([
                            'email' =>
                                'Akun Anda masih menunggu persetujuan admin.',
                        ])
                        ->onlyInput('email');
                }

                if ($user->status === 'ditolak') {

                    return back()
                        ->withErrors([
                            'email' =>
                                'Pendaftaran akun Anda ditolak oleh admin.',
                        ])
                        ->onlyInput('email');
                }

                return back()
                    ->withErrors([
                        'email' =>
                            'Akun Anda belum dapat digunakan.',
                    ])
                    ->onlyInput('email');
            }

            /*
            |--------------------------------------------------------------------------
            | LOGIN BERHASIL
            |--------------------------------------------------------------------------
            |
            | redirect()->intended() sangat penting.
            |
            | Contoh:
            |
            | Masyarakat membuka /saran
            |        ↓
            | Belum login
            |        ↓
            | Dialihkan ke /login
            |        ↓
            | Login berhasil
            |        ↓
            | Kembali ke /saran
            |
            | Jika login dilakukan langsung dari halaman login,
            | maka diarahkan ke dashboard masyarakat.
            |
            */

            return redirect()
                ->intended(
                    route('masyarakat.dashboard')
                )
                ->with(
                    'success',
                    'Selamat datang, ' . $user->nama . '!'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | ROLE TIDAK DIKENALI
        |--------------------------------------------------------------------------
        */

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return back()
            ->withErrors([
                'email' => 'Role akun tidak dikenali.',
            ])
            ->onlyInput('email');
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
            ->with(
                'success',
                'Berhasil keluar dari akun.'
            );
    }
}
