<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use App\Models\Permohonan;
use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ControllerPermohonan 
{
    /*
    |--------------------------------------------------------------------------
    | MENAMPILKAN DAFTAR PENGAJUAN AKTIF
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $permohonan = Permohonan::with('layanan')
            ->where('user_id', auth()->id())
            ->whereIn('status', ['diajukan', 'diproses'])
            ->latest()
            ->paginate(10);

        return view('masyarakat.pengajuan.index', compact('permohonan'));
    }

    /*
    |--------------------------------------------------------------------------
    | FORM TAMBAH PENGAJUAN
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        $layanan = Layanan::orderBy('judul')->get();
        return view('masyarakat.pengajuan.create', compact('layanan'));
    }

    /*
    |--------------------------------------------------------------------------
    | SIMPAN PENGAJUAN
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'layanan_id' => [
                'required',
                'exists:layanan,id',
            ],
            'keterangan' => [
                'nullable',
                'string',
                'max:2000',
            ],
        ], [
            'layanan_id.required' => 'Silakan pilih jenis layanan.',
            'layanan_id.exists' => 'Layanan yang dipilih tidak tersedia.',
            'keterangan.max' => 'Keterangan maksimal 2000 karakter.',
        ]);

        // Nomor permohonan otomatis dan unik
        do {
            $nomor = 'PMH-' . now()->format('Ymd') . '-'
                . Str::upper(Str::random(6));
        } while (
            Permohonan::where('nomor_permohonan', $nomor)->exists()
        );

        Permohonan::create([
            'user_id' => auth()->id(),
            'layanan_id' => $validated['layanan_id'],
            'nomor_permohonan' => $nomor,
            'tanggal_pengajuan' => now()->toDateString(),
            'status' => 'diajukan',
            'keterangan' => $validated['keterangan'] ?? null,
        ]);

        return redirect()
            ->route('masyarakat.pengajuan.index')
            ->with('success', 'Pengajuan berhasil dikirim. Nomor permohonan: ' . $nomor);
    }

    /*
    |--------------------------------------------------------------------------
    | FORM EDIT PENGAJUAN
    |--------------------------------------------------------------------------
    */
    public function edit($id)
    {
        $permohonan = Permohonan::where('user_id', auth()->id())
            ->where('status', 'diajukan')
            ->findOrFail($id);

        $layanan = Layanan::orderBy('judul')->get();

        return view(
            'masyarakat.pengajuan.edit',
            compact('permohonan', 'layanan')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE PENGAJUAN
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, $id)
    {
        $permohonan = Permohonan::where('user_id', auth()->id())
            ->where('status', 'diajukan')
            ->findOrFail($id);

        $validated = $request->validate([
            'layanan_id' => [
                'required',
                'exists:layanan,id',
            ],
            'keterangan' => [
                'nullable',
                'string',
                'max:2000',
            ],
        ], [
            'layanan_id.required' => 'Silakan pilih jenis layanan.',
            'layanan_id.exists' => 'Layanan tidak tersedia.',
            'keterangan.max' => 'Keterangan maksimal 2000 karakter.',
        ]);

        $permohonan->update([
            'layanan_id' => $validated['layanan_id'],
            'keterangan' => $validated['keterangan'] ?? null,
        ]);

        return redirect()
            ->route('masyarakat.pengajuan.index')
            ->with('success', 'Pengajuan berhasil diperbarui.');
    }

    /*
    |--------------------------------------------------------------------------
    | HAPUS / BATALKAN PENGAJUAN
    |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        $permohonan = Permohonan::where('user_id', auth()->id())
            ->where('status', 'diajukan')
            ->findOrFail($id);

        $permohonan->delete();

        return redirect()
            ->route('masyarakat.pengajuan.index')
            ->with('success', 'Pengajuan berhasil dibatalkan.');
    }

    /*
    |--------------------------------------------------------------------------
    | RIWAYAT SELURUH PERMOHONAN
    |--------------------------------------------------------------------------
    */
    public function riwayat()
    {
        $permohonan = Permohonan::with('layanan')
            ->where('user_id', auth()->id())
            ->latest()
            ->paginate(10);

        return view('masyarakat.riwayat.index', compact('permohonan'));
    }
}