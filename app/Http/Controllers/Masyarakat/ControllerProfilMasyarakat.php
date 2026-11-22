<?php

namespace App\Http\Controllers\Masyarakat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
     * Update profil masyarakat beserta foto
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

            'foto' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'nama.max' => 'Nama terlalu panjang.',

            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',

            'no_hp.max' => 'Nomor HP terlalu panjang.',
            'alamat.max' => 'Alamat terlalu panjang.',

            'foto.image' => 'File harus berupa gambar.',
            'foto.mimes' => 'Foto harus berformat JPG, JPEG, PNG, atau WEBP.',
            'foto.max' => 'Ukuran foto maksimal 2 MB.',
        ]);

        // Simpan data profil
        $user->nama = $validated['nama'];
        $user->email = $validated['email'];
        $user->no_hp = $validated['no_hp'] ?? null;
        $user->alamat = $validated['alamat'] ?? null;

        // Jika pengguna mengupload foto baru
        if ($request->hasFile('foto')) {

            $fotoBaru = $request->file('foto');

            $namaFile = 'masyarakat_' . $user->id . '_' . time()
                . '_' . Str::random(8)
                . '.' . $fotoBaru->getClientOriginalExtension();

            $pathFotoBaru = $fotoBaru->storeAs(
                'foto/masyarakat',
                $namaFile,
                'public'
            );

            // Hapus foto lama jika foto berada di folder masyarakat
            if (
                $user->foto &&
                str_starts_with($user->foto, 'foto/masyarakat/') &&
                Storage::disk('public')->exists($user->foto)
            ) {
                Storage::disk('public')->delete($user->foto);
            }

            // Simpan path foto baru ke database
            $user->foto = $pathFotoBaru;
        }

        $user->save();

        return redirect()
            ->route('masyarakat.profil')
            ->with('success', 'Profil berhasil diperbarui.');
    }

    /**
     * Update password masyarakat
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

        // Periksa password lama
        if (!Hash::check($request->password_lama, $user->password)) {
            return back()
                ->withErrors([
                    'password_lama' => 'Password lama tidak sesuai.',
                ])
                ->withInput();
        }

        // Simpan password baru
        $user->password = Hash::make($request->password_baru);

        $user->save();

        return redirect()
            ->route('masyarakat.profil')
            ->with('success_password', 'Password berhasil diperbarui.');
    }
}