<?php

namespace App\Http\Controllers\Auth;

use App\Models\ModelUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ControllerRegisterUser
{
    /**
     * Halaman registrasi
     */
    public function index()
    {
        return view('auth.registeruser');
    }

    /**
     * Proses registrasi masyarakat
     */
    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'no_hp' => 'required|string|max:20',
            'alamat' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email tersebut sudah terdaftar.',
            'no_hp.required' => 'Nomor HP wajib diisi.',
            'alamat.required' => 'Alamat wajib diisi.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 6 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak sama.',
        ]);

        /** @var ModelUser $user */
        ModelUser::query()->create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'masyarakat',
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'status' => 'pending',
        ]);

        return redirect()
            ->route('login')
            ->with(
                'success',
                'Registrasi berhasil! Akun Anda masih menunggu persetujuan admin sebelum dapat digunakan untuk login.'
            );
    }
}