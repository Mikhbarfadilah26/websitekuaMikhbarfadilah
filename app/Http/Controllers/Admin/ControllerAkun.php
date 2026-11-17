<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;


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
        | Validasi
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

            'foto' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

        ], [

            'nama.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'password.min' => 'Password minimal 6 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak sesuai.',
            'foto.image' => 'File harus berupa gambar.',
            'foto.mimes' => 'Foto harus JPG, JPEG, PNG, atau WEBP.',
            'foto.max' => 'Ukuran foto maksimal 2 MB.',

        ]);


        /*
        |--------------------------------------------------------------------------
        | Nama dan Email
        |--------------------------------------------------------------------------
        */

        $user->nama = $request->nama;
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
        | Upload Foto ke public/foto/admin
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('foto')) {

            $folderFoto = public_path('foto/admin');

            // Buat folder jika belum tersedia
            if (!File::exists($folderFoto)) {

                File::makeDirectory(
                    $folderFoto,
                    0755,
                    true
                );

            }

            // Ambil foto lama
            $fotoLama = $user->foto;

            // Buat nama file unik
            $namaFoto = 'admin_' . $user->id . '_' .
                time() . '.' .
                $request->file('foto')->getClientOriginalExtension();

            // Pindahkan foto ke public/foto/admin
            $request->file('foto')->move(
                $folderFoto,
                $namaFoto
            );

            // Simpan lokasi relatif ke database
            $user->foto = 'foto/admin/' . $namaFoto;

            // Simpan perubahan akun
            $user->save();

            // Hapus foto lama jika berasal dari folder foto/admin
            if (
                $fotoLama &&
                str_starts_with($fotoLama, 'foto/admin/') &&
                File::exists(public_path($fotoLama))
            ) {

                File::delete(public_path($fotoLama));

            }

        } else {

            $user->save();

        }


        /*
        |--------------------------------------------------------------------------
        | Redirect
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('admin.akun.index')
            ->with(
                'success',
                'Informasi akun berhasil diperbarui.'
            );
    }
}