<?php

namespace App\Http\Controllers\Landing;

use App\Models\Berita;
use App\Models\Layanan;
use Illuminate\Http\Request;

class ControllerLanding 
{
    /**
     * =========================================================
     * HALAMAN UTAMA / BERANDA
     * =========================================================
     */
    public function index()
    {
        // Mengambil semua berita dari database
        $berita = Berita::latest()->get();

        $layanan = Layanan::orderBy('id')->get();

        return view('landing.index', compact(
            'berita',
            'layanan'
        ));
    }


    /**
     * =========================================================
     * HALAMAN TENTANG KUA
     * =========================================================
     */
    public function tentang()
    {
        $layanan = Layanan::orderBy('id')->get();

        return view('landing.tentang', compact(
            'layanan'
        ));
    }


    /**
     * =========================================================
     * HALAMAN VISI DAN MISI
     * =========================================================
     */
    public function visimisi()
    {
        $layanan = Layanan::orderBy('id')->get();

        return view('landing.visimisi', compact(
            'layanan'
        ));
    }


    /**
     * =========================================================
     * HALAMAN BERITA
     * =========================================================
     */
    public function berita()
    {
        // Mengambil semua berita
        $berita = Berita::latest()->get();

        $layanan = Layanan::orderBy('id')->get();

        return view('landing.berita', compact(
            'berita',
            'layanan'
        ));
    }


    /**
     * =========================================================
     * DETAIL BERITA
     * =========================================================
     */
    public function detailBerita($slug)
    {
        // Berita yang sedang dibuka
        $berita = Berita::where('slug', $slug)
            ->firstOrFail();

        // Mengambil 4 berita terbaru selain berita yang dibuka
        $beritaTerbaru = Berita::where('id', '!=', $berita->id)
            ->latest('created_at')
            ->take(4)
            ->get();

        // Data layanan untuk navbar/layout
        $layanan = Layanan::orderBy('id')->get();

        return view('landing.detail-berita', compact(
            'berita',
            'beritaTerbaru',
            'layanan'
        ));
    }


    /**
     * =========================================================
     * HALAMAN LAYANAN
     * =========================================================
     */
    public function layanan()
    {
        $layanan = Layanan::orderBy('id')->get();

        return view('landing.layanan', compact(
            'layanan'
        ));
    }


    /**
     * =========================================================
     * HALAMAN PERSYARATAN
     * =========================================================
     */
    public function persyaratan()
    {
        // Mengambil layanan ID 1 beserta persyaratannya
        $layanan = Layanan::with('persyaratan')
            ->findOrFail(1);

        // Mengambil seluruh data layanan untuk navbar
        $dataLayanan = Layanan::orderBy('id')->get();

        return view('landing.persyaratan', compact(
            'layanan',
            'dataLayanan'
        ));
    }


    /**
     * =========================================================
     * HALAMAN KONTAK
     * =========================================================
     */
    public function kontak()
    {
        $layanan = Layanan::orderBy('id')->get();

        return view('landing.kontak', compact(
            'layanan'
        ));
    }


    /**
     * =========================================================
     * PENCARIAN UNIVERSAL
     * =========================================================
     */
    public function pencarian(Request $request)
    {
        // Mengambil kata kunci pencarian
        $keyword = trim($request->get('search', ''));

        // Jika pencarian kosong
        if ($keyword === '') {
            return redirect()->route('landing.index');
        }

        // Mencari layanan berdasarkan judul dan isi
        $layanan = Layanan::where(function ($query) use ($keyword) {
                $query->where('judul', 'like', '%' . $keyword . '%')
                    ->orWhere('isi', 'like', '%' . $keyword . '%');
            })
            ->orderBy('id')
            ->get();

        // Mencari berita berdasarkan judul dan isi
        $berita = Berita::where(function ($query) use ($keyword) {
                $query->where('judul', 'like', '%' . $keyword . '%')
                    ->orWhere('isi', 'like', '%' . $keyword . '%');
            })
            ->latest()
            ->get();

        // Data layanan untuk navbar
        $dataLayanan = Layanan::orderBy('id')->get();

        // Menghitung seluruh hasil pencarian
        $totalHasil = $layanan->count() + $berita->count();

        return view('landing.pencarian', compact(
            'keyword',
            'layanan',
            'berita',
            'dataLayanan',
            'totalHasil'
        ));
    }
}