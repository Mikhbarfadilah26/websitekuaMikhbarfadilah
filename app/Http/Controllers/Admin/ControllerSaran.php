<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Saran;
use Illuminate\Http\Request;

class ControllerSaran 
{
    /*
    |--------------------------------------------------------------------------
    | DAFTAR SARAN, PENGADUAN, DAN KOMENTAR
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $query = Saran::with(['user', 'berita'])->latest();

        // PENCARIAN
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('isi_saran', 'like', '%' . $search . '%')
                    ->orWhere('status', 'like', '%' . $search . '%')
                    ->orWhereHas('user', function ($userQuery) use ($search) {
                        $userQuery->where('nama', 'like', '%' . $search . '%')
                            ->orWhere('email', 'like', '%' . $search . '%');
                    })
                    ->orWhereHas('berita', function ($beritaQuery) use ($search) {
                        $beritaQuery->where('judul', 'like', '%' . $search . '%');
                    });
            });
        }

        // FILTER STATUS
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // FILTER JENIS
        if ($request->jenis === 'komentar') {
            $query->whereNotNull('berita_id');
        } elseif ($request->jenis === 'saran') {
            $query->whereNull('berita_id');
        }

        $saran = $query->paginate(10)->withQueryString();

        return view('admin.saran.index', compact('saran'));
    }


    /*
    |--------------------------------------------------------------------------
    | DETAIL SARAN / KOMENTAR
    |--------------------------------------------------------------------------
    */

    public function show($id)
    {
        $saran = Saran::with(['user', 'berita'])->findOrFail($id);

        // UBAH STATUS BARU MENJADI DIBACA
        if ($saran->status === 'baru') {
            $saran->update([
                'status' => 'dibaca',
            ]);
        }

        return view('admin.saran.show', compact('saran'));
    }


    /*
    |--------------------------------------------------------------------------
    | BALAS SARAN / KOMENTAR
    |--------------------------------------------------------------------------
    */

    public function balas(Request $request, $id)
    {
        $request->validate([
            'tanggapan' => ['required', 'string', 'min:3', 'max:2000'],
        ], [
            'tanggapan.required' => 'Balasan wajib diisi.',
            'tanggapan.min' => 'Balasan minimal 3 karakter.',
            'tanggapan.max' => 'Balasan maksimal 2000 karakter.',
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


    /*
    |--------------------------------------------------------------------------
    | HAPUS SARAN / KOMENTAR
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $saran = Saran::findOrFail($id);

        $saran->delete();

        return redirect()
            ->route('admin.saran.index')
            ->with('success', 'Data berhasil dihapus.');
    }
}