<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\KomentarBerita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllerKomentarBerita 
{
    public function store(Request $request, $slug)
    {
        // Validasi input komentar
        $request->validate([
            'isi_komentar' => 'required|string|max:2000',
        ], [
            'isi_komentar.required' => 'Komentar tidak boleh kosong.',
            'isi_komentar.max' => 'Komentar maksimal 2000 karakter.',
        ]);

        // Pastikan hanya masyarakat dengan status disetujui yang bisa berkomentar
        $user = Auth::user();
        if (!$user || $user->role !== 'masyarakat' || $user->status !== 'disetujui') {
            return back()->with('error', 'Anda tidak memiliki akses untuk mengirim komentar.');
        }

        // Cari berita berdasarkan slug
        $berita = Berita::where('slug', $slug)->firstOrFail();

        // Simpan komentar ke tabel komentar_berita
        KomentarBerita::create([
            'berita_id' => $berita->id,
            'user_id' => $user->id,
            'isi_komentar' => $request->isi_komentar,
        ]);

        return redirect(route('berita.detail', $berita->slug) . '#komentar')
            ->with('success', 'Komentar Anda berhasil dikirim.');
    }
}