<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ControllerProfilMasyarakat 
{
    /**
     * Tampilkan profil masyarakat
     */
    public function index()
    {
        $user = Auth::user();

        return view('masyarakat.profil.index', compact('user'));
    }


    /**
     * Update profil masyarakat
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'nama' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email,' . $user->id,
            ],

            'no_hp' => [
                'nullable',
                'string',
                'max:20',
            ],

            'alamat' => [
                'nullable',
                'string',
                'max:500',
            ],
        ], [
            'nama.required' => 'Nama wajib diisi.',

            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',

            'no_hp.max' => 'Nomor HP terlalu panjang.',

            'alamat.max' => 'Alamat terlalu panjang.',
        ]);

        $user->nama = $validated['nama'];
        $user->email = $validated['email'];
        $user->no_hp = $validated['no_hp'] ?? null;
        $user->alamat = $validated['alamat'] ?? null;

        $user->save();

        return redirect()
            ->route('masyarakat.profil')
            ->with('success', 'Profil berhasil diperbarui.');
    }


    /**
     * Update password
     */
    public function password(Request $request)
    {
        $request->validate([
            'password_lama' => [
                'required',
            ],

            'password_baru' => [
                'required',
                'min:8',
                'confirmed',
            ],
        ], [
            'password_lama.required' => 'Password lama wajib diisi.',

            'password_baru.required' => 'Password baru wajib diisi.',
            'password_baru.min' => 'Password baru minimal 8 karakter.',
            'password_baru.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->password_lama, $user->password)) {

            return back()
                ->withErrors([
                    'password_lama' => 'Password lama tidak sesuai.',
                ])
                ->withInput();
        }

        $user->password = Hash::make($request->password_baru);

        $user->save();

        return redirect()
            ->route('masyarakat.profil')
            ->with('success_password', 'Password berhasil diperbarui.');
    }
}