<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use App\Models\Saran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllerTanyaMasyarakat 
{
    public function index()
    {
        // Ambil pertanyaan milik user yang sedang login (berita_id = null)
        $riwayatTanya = Saran::where('user_id', Auth::id())
            ->whereNull('berita_id')
            ->latest()
            ->get();

        return view('masyarakat.tanya.index', compact('riwayatTanya'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'isi_saran' => 'required|string|max:2000',
        ], [
            'isi_saran.required' => 'Pertanyaan tidak boleh kosong.',
            'isi_saran.max' => 'Pertanyaan maksimal 2000 karakter.',
        ]);

        Saran::create([
            'user_id' => Auth::id(),
            'berita_id' => null, // Menandakan ini adalah pertanyaan untuk admin, bukan komentar berita
            'isi_saran' => $request->isi_saran,
            'status' => 'baru',
        ]);

        return redirect()->route('masyarakat.tanya.index')
            ->with('success', 'Pertanyaan Anda berhasil dikirim ke Admin.');
    }
}