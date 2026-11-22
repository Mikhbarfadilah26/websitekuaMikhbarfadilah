<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Layanan;
use App\Models\Saran;
use App\Models\Permohonan;

class ControllerLaporan 
{
    /**
     * Halaman utama laporan admin KUA.
     */
    public function index()
    {
        $totalBerita = Berita::count();
        $beritaHariIni = Berita::whereDate('created_at', today())->count();
        $beritaBulanIni = Berita::whereYear('created_at', now()->year)
                                ->whereMonth('created_at', now()->month)
                                ->count();

        $totalLayanan = Layanan::count();
        $totalSaran = Saran::whereNull('berita_id')->count();
        $totalKomentar = Saran::whereNotNull('berita_id')->count();
        
        // Statistik tambahan untuk Pengajuan/Permohonan masyarakat
        $totalPengajuan = class_exists(Permohonan::class) ? Permohonan::count() : 0;
        $pengajuanPending = class_exists(Permohonan::class) ? Permohonan::where('status', 'pending')->count() : 0;
        $pengajuanSelesai = class_exists(Permohonan::class) ? Permohonan::whereIn('status', ['disetujui', 'selesai'])->count() : 0;

        return view('admin.laporan.index', compact(
            'totalBerita',
            'beritaHariIni',
            'beritaBulanIni',
            'totalLayanan',
            'totalSaran',
            'totalKomentar',
            'totalPengajuan',
            'pengajuanPending',
            'pengajuanSelesai'
        ));
    }
}