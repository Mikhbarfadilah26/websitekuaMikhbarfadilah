<?php

namespace App\Http\Controllers\Saran;

use App\Http\Controllers\Controller;
use App\Models\Saran;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaranController
{
    /*
    |--------------------------------------------------------------------------
    | HALAMAN FORM SARAN UMUM
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        if ($user->role !== 'masyarakat') {
            abort(403, 'Hanya masyarakat yang dapat mengirim saran.');
        }

        if ($user->status !== 'disetujui') {
            Auth::logout();

            request()->session()->invalidate();
            request()->session()->regenerateToken();

            return redirect()->route('login')->withErrors([
                'email' => 'Akun masyarakat Anda belum disetujui oleh admin.',
            ]);
        }

        return view('landing.form-saran');
    }

    /*
    |--------------------------------------------------------------------------
    | SIMPAN SARAN UMUM
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        if ($user->role !== 'masyarakat') {
            abort(403, 'Hanya masyarakat yang dapat mengirim saran.');
        }

        if ($user->status !== 'disetujui') {
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('login')->withErrors([
                'email' => 'Akun masyarakat Anda belum disetujui oleh admin.',
            ]);
        }

        $request->validate([
            'isi_saran' => ['required', 'string', 'max:1000'],
        ], [
            'isi_saran.required' => 'Saran atau pengaduan wajib diisi.',
            'isi_saran.max' => 'Saran maksimal 1000 karakter.',
        ]);

        Saran::create([
            'user_id' => $user->id,
            'berita_id' => null,
            'isi_saran' => $request->isi_saran,
            'status' => 'baru',
            'tanggapan' => null,
        ]);

        return redirect()
            ->route('landing.saran.create')
            ->with('success', 'Terima kasih. Saran Anda berhasil dikirim.');
    }

    /*
    |--------------------------------------------------------------------------
    | SIMPAN KOMENTAR BERITA
    |--------------------------------------------------------------------------
    */

    public function komentar(Request $request, $slug)
    {
        if (!Auth::check()) {
            return redirect()->route('login', [
                'redirect' => route('berita.detail', $slug) . '#komentar',
            ]);
        }

        $user = Auth::user();

        if ($user->role !== 'masyarakat') {
            abort(403, 'Hanya masyarakat yang dapat memberikan komentar.');
        }

        if ($user->status !== 'disetujui') {
            return redirect()
                ->route('berita.detail', $slug)
                ->with('error', 'Akun Anda belum disetujui untuk memberikan komentar.');
        }

        $request->validate([
            'isi_saran' => ['required', 'string', 'max:2000'],
        ], [
            'isi_saran.required' => 'Komentar wajib diisi.',
            'isi_saran.max' => 'Komentar maksimal 2000 karakter.',
        ]);

        $berita = Berita::where('slug', $slug)->firstOrFail();

        Saran::create([
            'user_id' => $user->id,
            'berita_id' => $berita->id,
            'isi_saran' => $request->isi_saran,
            'status' => 'baru',
            'tanggapan' => null,
        ]);

        return redirect()
            ->to(route('berita.detail', $berita->slug) . '#komentar')
            ->with('success', 'Komentar berhasil dikirim.');
    }
}