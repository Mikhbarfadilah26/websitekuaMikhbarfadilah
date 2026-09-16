<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ControllerAkun 
{
    /**
     * Halaman Akun Saya
     */
    public function index()
    {
        return view('admin.akun.index');
    }


    /**
     * Update data akun
     */
    public function update(Request $request)
    {
        $user = auth()->user();

        /*
        |--------------------------------------------------------------------------
        | Validasi nama
        |--------------------------------------------------------------------------
        */
        $request->validate([

            'nama' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],

            'password' => [
                'nullable',
                'string',
                'min:6',
                'confirmed',
            ],

        ], [

            'nama.required' => 'Nama wajib diisi.',

            'email.required' => 'Email wajib diisi.',

            'email.email' => 'Format email tidak valid.',

            'email.unique' => 'Email sudah digunakan.',

            'password.min' => 'Password minimal 6 karakter.',

            'password.confirmed' => 'Konfirmasi password tidak sesuai.',

        ]);


        /*
        |--------------------------------------------------------------------------
        | Tentukan kolom nama
        |--------------------------------------------------------------------------
        |
        | Project ini sebelumnya menggunakan "nama",
        | tetapi database terbaru bisa menggunakan "name".
        |
        */
        if (isset($user->nama)) {

            $user->nama = $request->nama;

        } else {

            $user->name = $request->nama;

        }


        /*
        |--------------------------------------------------------------------------
        | Email
        |--------------------------------------------------------------------------
        */

        $user->email = $request->email;


        /*
        |--------------------------------------------------------------------------
        | Password
        |--------------------------------------------------------------------------
        */

        if ($request->filled('password')) {

            $user->password = Hash::make(
                $request->password
            );

        }


        /*
        |--------------------------------------------------------------------------
        | Simpan
        |--------------------------------------------------------------------------
        */

        $user->save();


        return redirect()
            ->route('admin.akun.index')
            ->with(
                'success',
                'Informasi akun berhasil diperbarui.'
            );
    }
}
