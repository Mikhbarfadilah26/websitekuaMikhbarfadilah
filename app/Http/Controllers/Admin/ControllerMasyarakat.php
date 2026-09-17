<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ModelUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ControllerMasyarakat 
{
    /**
     * Menampilkan daftar masyarakat
     */
    public function index(Request $request)
    {
        // ==============================
        // STATISTIK MASYARAKAT
        // ==============================

        $jumlahSemua = ModelUser::where('role', 'masyarakat')
            ->count();

        $jumlahPending = ModelUser::where('role', 'masyarakat')
            ->where('status', 'pending')
            ->count();

        $jumlahDisetujui = ModelUser::where('role', 'masyarakat')
            ->where('status', 'disetujui')
            ->count();

        $jumlahDitolak = ModelUser::where('role', 'masyarakat')
            ->where('status', 'ditolak')
            ->count();


        // ==============================
        // DATA MASYARAKAT
        // ==============================

        $query = ModelUser::where('role', 'masyarakat');


        // Pencarian
        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('nama', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%')
                    ->orWhere('no_hp', 'like', '%' . $search . '%')
                    ->orWhere('alamat', 'like', '%' . $search . '%');

            });
        }


        // Filter status
        if ($request->filled('status')) {

            $query->where('status', $request->status);

        }


        $masyarakat = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();


        return view('admin.masyarakat.index', compact(
            'masyarakat',
            'jumlahSemua',
            'jumlahPending',
            'jumlahDisetujui',
            'jumlahDitolak'
        ));
    }


    /**
     * Menampilkan form tambah masyarakat
     */
    public function create()
    {
        return view('admin.masyarakat.create');
    }


    /**
     * Menyimpan masyarakat yang ditambahkan ADMIN
     *
     * Data dari admin otomatis DISETUJUI.
     */
    public function store(Request $request)
    {
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
                'unique:users,email',
            ],

            'no_hp' => [
                'nullable',
                'string',
                'max:20',
            ],

            'alamat' => [
                'nullable',
                'string',
            ],

            'password' => [
                'required',
                'string',
                'min:6',
                'confirmed',
            ],
        ], [
            'nama.required' => 'Nama lengkap wajib diisi.',

            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',

            'no_hp.max' => 'Nomor HP maksimal 20 karakter.',

            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 6 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);


        // ==========================================
        // ADMIN MENAMBAHKAN MASYARAKAT
        // OTOMATIS DISETUJUI
        // ==========================================

        ModelUser::create([
            'nama' => $request->nama,

            'email' => $request->email,

            'role' => 'masyarakat',

            'no_hp' => $request->no_hp,

            'alamat' => $request->alamat,

            'password' => Hash::make(
                $request->password
            ),

            'status' => 'disetujui',
        ]);


        return redirect()
            ->route('admin.masyarakat.index')
            ->with(
                'success',
                'Data masyarakat berhasil ditambahkan dan otomatis disetujui.'
            );
    }


    /**
     * Menampilkan form edit masyarakat
     */
    public function edit(ModelUser $masyarakat)
    {
        abort_if(
            $masyarakat->role !== 'masyarakat',
            404
        );


        return view(
            'admin.masyarakat.edit',
            compact('masyarakat')
        );
    }


    /**
     * Mengubah data masyarakat
     */
    public function update(
        Request $request,
        ModelUser $masyarakat
    ) {
        abort_if(
            $masyarakat->role !== 'masyarakat',
            404
        );


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
                'unique:users,email,' . $masyarakat->id,
            ],

            'no_hp' => [
                'nullable',
                'string',
                'max:20',
            ],

            'alamat' => [
                'nullable',
                'string',
            ],

            'password' => [
                'nullable',
                'string',
                'min:6',
                'confirmed',
            ],
        ], [
            'nama.required' => 'Nama lengkap wajib diisi.',

            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',

            'password.min' => 'Password minimal 6 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);


        $data = [
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
        ];


        // Password hanya diubah jika diisi
        if ($request->filled('password')) {

            $data['password'] = Hash::make(
                $request->password
            );
        }


        $masyarakat->update($data);


        return redirect()
            ->route('admin.masyarakat.index')
            ->with(
                'success',
                'Data masyarakat berhasil diperbarui.'
            );
    }


    /**
     * Menghapus masyarakat
     */
    public function destroy(ModelUser $masyarakat)
    {
        abort_if(
            $masyarakat->role !== 'masyarakat',
            404
        );


        $masyarakat->delete();


        return redirect()
            ->route('admin.masyarakat.index')
            ->with(
                'success',
                'Data masyarakat berhasil dihapus.'
            );
    }


    /**
     * Menyetujui pendaftaran masyarakat
     */
    public function setujui(ModelUser $masyarakat)
    {
        abort_if(
            $masyarakat->role !== 'masyarakat',
            404
        );


        $masyarakat->update([
            'status' => 'disetujui',
        ]);


        return redirect()
            ->route('admin.masyarakat.index')
            ->with(
                'success',
                'Pendaftaran masyarakat berhasil disetujui.'
            );
    }


    /**
     * Menolak pendaftaran masyarakat
     */
    public function tolak(ModelUser $masyarakat)
    {
        abort_if(
            $masyarakat->role !== 'masyarakat',
            404
        );


        $masyarakat->update([
            'status' => 'ditolak',
        ]);


        return redirect()
            ->route('admin.masyarakat.index')
            ->with(
                'success',
                'Pendaftaran masyarakat berhasil ditolak.'
            );
    }
}
