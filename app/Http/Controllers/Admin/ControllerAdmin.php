<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ModelUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ControllerAdmin 
{
    public function index(Request $request)
    {
        $query = ModelUser::where('role', 'admin');

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $admin = $query->latest()->paginate(10)->withQueryString();

        $totalAdmin = ModelUser::where('role', 'admin')->count();

        return view('admin.admin.index', compact(
            'admin',
            'totalAdmin'
        ));
    }

    public function create()
    {
        return view('admin.admin.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'no_hp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string|max:1000',
        ]);

        ModelUser::create([
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'admin',
            'no_hp' => $validated['no_hp'] ?? null,
            'alamat' => $validated['alamat'] ?? null,
            'status' => 'disetujui',
        ]);

        return redirect()
            ->route('admin.admin.index')
            ->with('success', 'Akun admin berhasil ditambahkan dan langsung aktif.');
    }

    public function edit($id)
    {
        $admin = ModelUser::where('role', 'admin')->findOrFail($id);

        return view('admin.admin.edit', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $admin = ModelUser::where('role', 'admin')->findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($admin->id),
            ],
            'password' => 'nullable|string|min:6|confirmed',
            'no_hp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string|max:1000',
        ]);

        $admin->nama = $validated['nama'];
        $admin->email = $validated['email'];
        $admin->no_hp = $validated['no_hp'] ?? null;
        $admin->alamat = $validated['alamat'] ?? null;

        // Admin selalu aktif.
        $admin->status = 'disetujui';

        if (!empty($validated['password'])) {
            $admin->password = Hash::make($validated['password']);
        }

        $admin->save();

        return redirect()
            ->route('admin.admin.index')
            ->with('success', 'Data admin berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $admin = ModelUser::where('role', 'admin')->findOrFail($id);

        // Mencegah admin menghapus akunnya sendiri.
        if (auth()->id() == $admin->id) {
            return back()->with('error', 'Akun yang sedang digunakan tidak dapat dihapus.');
        }

        // Mencegah penghapusan admin terakhir.
        $jumlahAdmin = ModelUser::where('role', 'admin')->count();

        if ($jumlahAdmin <= 1) {
            return back()->with('error', 'Admin terakhir tidak boleh dihapus.');
        }

        $admin->delete();

        return redirect()
            ->route('admin.admin.index')
            ->with('success', 'Akun admin berhasil dihapus.');
    }
}