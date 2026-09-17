<?php

namespace App\Http\Controllers\Saran;

use App\Http\Controllers\Controller;
use App\Models\Saran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaranController
{
    /**
     * =========================================================
     * FORM SARAN
     * =========================================================
     *
     * Form hanya boleh dibuka oleh masyarakat
     * yang sudah login dan telah disetujui admin.
     */
    public function create()
    {
        /*
        |--------------------------------------------------------------------------
        | CEK LOGIN
        |--------------------------------------------------------------------------
        */

        if (!Auth::check()) {
            return redirect()
                ->route('login');
        }

        $user = Auth::user();

        /*
        |--------------------------------------------------------------------------
        | CEK ROLE
        |--------------------------------------------------------------------------
        |
        | Hanya masyarakat yang boleh menggunakan
        | fitur Saran & Pengaduan.
        |
        */

        if ($user->role !== 'masyarakat') {
            abort(403, 'Hanya masyarakat yang dapat mengirim saran dan pengaduan.');
        }

        /*
        |--------------------------------------------------------------------------
        | CEK STATUS
        |--------------------------------------------------------------------------
        */

        if ($user->status !== 'disetujui') {

            Auth::logout();

            request()->session()->invalidate();

            request()->session()->regenerateToken();

            return redirect()
                ->route('login')
                ->withErrors([
                    'email' =>
                        'Akun masyarakat Anda belum disetujui oleh admin.',
                ]);
        }

        /*
        |--------------------------------------------------------------------------
        | TAMPILKAN FORM
        |--------------------------------------------------------------------------
        */

        return view('landing.form-saran');
    }

    /**
     * =========================================================
     * SIMPAN SARAN
     * =========================================================
     *
     * Saran hanya dapat dikirim oleh masyarakat
     * yang sudah login dan disetujui.
     */
    public function store(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | CEK LOGIN
        |--------------------------------------------------------------------------
        */

        if (!Auth::check()) {
            return redirect()
                ->route('login');
        }

        $user = Auth::user();

        /*
        |--------------------------------------------------------------------------
        | CEK ROLE
        |--------------------------------------------------------------------------
        */

        if ($user->role !== 'masyarakat') {
            abort(403, 'Hanya masyarakat yang dapat mengirim saran dan pengaduan.');
        }

        /*
        |--------------------------------------------------------------------------
        | CEK STATUS
        |--------------------------------------------------------------------------
        */

        if ($user->status !== 'disetujui') {

            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect()
                ->route('login')
                ->withErrors([
                    'email' =>
                        'Akun masyarakat Anda belum disetujui oleh admin.',
                ]);
        }

        /*
        |--------------------------------------------------------------------------
        | VALIDASI
        |--------------------------------------------------------------------------
        */

        $request->validate(
            [
                'isi_saran' => [
                    'required',
                    'string',
                    'max:1000',
                ],
            ],
            [
                'isi_saran.required' =>
                    'Saran atau pengaduan wajib diisi.',

                'isi_saran.string' =>
                    'Saran atau pengaduan harus berupa teks.',

                'isi_saran.max' =>
                    'Saran maksimal 1000 karakter.',
            ]
        );

        /*
        |--------------------------------------------------------------------------
        | SIMPAN KE DATABASE
        |--------------------------------------------------------------------------
        |
        | user_id otomatis menggunakan ID masyarakat
        | yang sedang login.
        |
        */

        Saran::create([
            'user_id' => $user->id,
            'isi_saran' => $request->isi_saran,
            'status' => 'baru',
            'tanggapan' => null,
        ]);

        /*
        |--------------------------------------------------------------------------
        | KEMBALI KE FORM
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('landing.saran.create')
            ->with(
                'success',
                'Terima kasih. Saran Anda berhasil dikirim.'
            );
    }
}
