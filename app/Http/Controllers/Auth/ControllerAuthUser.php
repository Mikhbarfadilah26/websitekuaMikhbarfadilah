<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllerAuthUser
{
    /**
     * =========================================================
     * HALAMAN LOGIN
     * =========================================================
     */
    public function index(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | SIMPAN TUJUAN REDIRECT
        |--------------------------------------------------------------------------
        |
        | Jika masyarakat membuka login dari halaman komentar,
        | simpan alamat halaman berita agar setelah login
        | pengguna kembali ke halaman tersebut.
        |
        */

        $redirect = $request->query('redirect');

        if (!empty($redirect)) {
            $parsedUrl = parse_url($redirect);

            $isRelativeUrl =
                str_starts_with($redirect, '/') &&
                !str_starts_with($redirect, '//');

            $isSameHost =
                isset($parsedUrl['host']) &&
                strtolower($parsedUrl['host']) ===
                strtolower($request->getHost());

            $isSameScheme =
                !isset($parsedUrl['scheme']) ||
                strtolower($parsedUrl['scheme']) ===
                strtolower($request->getScheme());

            if (
                $isRelativeUrl ||
                ($isSameHost && $isSameScheme)
            ) {
                $request->session()->put(
                    'url.intended',
                    $redirect
                );
            }
        }

        return view('auth.loginuser');
    }

    /**
     * =========================================================
     * PROSES LOGIN
     * =========================================================
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
                ->intended(route('admin.dashboard'))
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
            | Hanya masyarakat dengan status disetujui
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
            | LOGIN MASYARAKAT BERHASIL
            |--------------------------------------------------------------------------
            |
            | Jika login berasal dari halaman komentar berita,
            | pengguna kembali ke halaman berita tersebut.
            |
            | Jika login dilakukan langsung dari halaman login,
            | pengguna diarahkan ke dashboard masyarakat.
            |
            */

            return redirect()
                ->intended(route('masyarakat.dashboard'))
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
     * =========================================================
     * LOGOUT
     * =========================================================
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