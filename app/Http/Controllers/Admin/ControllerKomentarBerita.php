<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KomentarBerita;
use Illuminate\Http\Request;

class ControllerKomentarBerita 
{
    /**
     * Menampilkan daftar komentar/pertanyaan beserta info beritanya
     */
    public function index(Request $request)
    {
        // Eager load relasi 'berita' dan 'user' agar admin langsung tahu berita mana yang dikomentari
        $query = KomentarBerita::with(['berita', 'user']);

        // Fitur pencarian berdasarkan isi komentar, tanggapan, atau judul berita
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('isi_komentar', 'like', '%' . $search . '%')
                  ->orWhere('tanggapan', 'like', '%' . $search . '%')
                  ->orWhereHas('berita', function ($qBerita) use ($search) {
                      $qBerita->where('judul', 'like', '%' . $search . '%');
                  });
            });
        }

        // Filter berdasarkan status balasan ('belum' atau 'sudah')
        if ($request->filled('status')) {
            if ($request->status === 'belum') {
                $query->whereNull('tanggapan');
            } elseif ($request->status === 'sudah') {
                $query->whereNotNull('tanggapan');
            }
        }

        // Urutkan komentar yang belum dibalas di posisi teratas, lalu berdasarkan yang terbaru
        $komentar = $query
            ->orderByRaw('tanggapan IS NOT NULL')
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.komentar.index', compact('komentar'));
    }

    /**
     * Simpan atau perbarui tanggapan/balasan admin
     */
    public function balas(Request $request, $id)
    {
        $request->validate([
            'tanggapan' => 'required|string|max:2000',
        ], [
            'tanggapan.required' => 'Tanggapan tidak boleh kosong.',
            'tanggapan.max'      => 'Tanggapan maksimal 2000 karakter.',
        ]);

        $komentar = KomentarBerita::findOrFail($id);

        $komentar->update([
            'tanggapan' => $request->tanggapan,
        ]);

        return redirect()
            ->route('admin.komentar.index')
            ->with('success', 'Tanggapan berhasil dikirim.');
    }

    /**
     * Hapus komentar
     */
    public function destroy($id)
    {
        $komentar = KomentarBerita::findOrFail($id);
        $komentar->delete();

        return redirect()
            ->route('admin.komentar.index')
            ->with('success', 'Komentar berhasil dihapus.');
    }
}