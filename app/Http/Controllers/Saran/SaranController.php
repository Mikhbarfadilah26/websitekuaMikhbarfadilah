<?php

namespace App\Http\Controllers\Saran;

use App\Http\Controllers\Controller;
use App\Models\Saran;
use Illuminate\Http\Request;

class SaranController 
{
    /**
     * =========================================================
     * FORM SARAN
     * =========================================================
     *
     * Halaman ini bersifat PUBLIC.
     * Siapa saja dapat membuka form tanpa login.
     */
    public function create()
    {
        return view('landing.form-saran');
    }


    /**
     * =========================================================
     * SIMPAN SARAN
     * =========================================================
     *
     * Saran dapat dikirim tanpa login.
     * Oleh karena itu user_id disimpan NULL.
     */
    public function store(Request $request)
    {
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
        | Tabel yang digunakan adalah `saran`.
        | Model Saran harus memiliki:
        |
        | protected $table = 'saran';
        |
        */

        Saran::create([
            'user_id'   => null,
            'isi_saran' => $request->isi_saran,
            'status'    => 'baru',
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