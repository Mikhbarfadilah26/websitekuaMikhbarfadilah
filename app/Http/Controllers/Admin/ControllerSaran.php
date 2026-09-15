<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Saran;
use Illuminate\Http\Request;

class ControllerSaran
{
    /**
     * Menampilkan semua saran.
     */
    public function index(Request $request)
    {
        $query = Saran::with('user')
            ->latest();

        /*
        |--------------------------------------------------------------------------
        | Pencarian
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('isi_saran', 'like', '%' . $search . '%')

                    ->orWhere('status', 'like', '%' . $search . '%')

                    ->orWhereHas('user', function ($userQuery) use ($search) {
                        $userQuery->where('nama', 'like', '%' . $search . '%')
                            ->orWhere('email', 'like', '%' . $search . '%');
                    });
            });
        }

        /*
        |--------------------------------------------------------------------------
        | Filter Status
        |--------------------------------------------------------------------------
        */

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $saran = $query->paginate(10)->withQueryString();

        return view('admin.saran.index', compact('saran'));
    }


    /**
     * Menampilkan detail saran.
     */
    public function show($id)
    {
        $saran = Saran::with('user')->findOrFail($id);

        /*
        |--------------------------------------------------------------------------
        | Jika saran masih baru, otomatis menjadi dibaca
        |--------------------------------------------------------------------------
        */

        if ($saran->status === 'baru') {
            $saran->update([
                'status' => 'dibaca',
            ]);
        }

        return view('admin.saran.show', compact('saran'));
    }


    /**
     * Menyimpan balasan Admin.
     */
    public function balas(Request $request, $id)
    {
        $request->validate([
            'tanggapan' => [
                'required',
                'string',
                'min:3',
            ],
        ], [
            'tanggapan.required' => 'Balasan wajib diisi.',
            'tanggapan.min' => 'Balasan minimal 3 karakter.',
        ]);

        $saran = Saran::findOrFail($id);

        $saran->update([
            'tanggapan' => $request->tanggapan,
            'status' => 'dibalas',
        ]);

        return redirect()
            ->route('admin.saran.show', $saran->id)
            ->with('success', 'Balasan berhasil dikirim.');
    }


    /**
     * Menghapus saran.
     */
    public function destroy($id)
    {
        $saran = Saran::findOrFail($id);

        $saran->delete();

        return redirect()
            ->route('admin.saran.index')
            ->with('success', 'Saran berhasil dihapus.');
    }
}
