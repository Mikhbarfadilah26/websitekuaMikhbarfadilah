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
        $berita = Berita::latest()
            ->take(3)
            ->get();

        $layanan = Layanan::orderBy('id')
            ->get();

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
        $layanan = Layanan::orderBy('id')
            ->get();

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
        $layanan = Layanan::orderBy('id')
            ->get();

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
        $berita = Berita::latest()
            ->get();

        $layanan = Layanan::orderBy('id')
            ->get();

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
        /*
        |--------------------------------------------------------------------------
        | BERITA YANG SEDANG DIBUKA
        |--------------------------------------------------------------------------
        */

        $berita = Berita::where('slug', $slug)
            ->firstOrFail();


        /*
        |--------------------------------------------------------------------------
        | BERITA TERBARU
        |--------------------------------------------------------------------------
        |
        | Mengambil 4 berita terbaru dari database.
        | Berita yang sedang dibuka tidak ditampilkan lagi.
        |
        */

        $beritaTerbaru = Berita::where('id', '!=', $berita->id)
            ->latest('created_at')
            ->take(4)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | DATA LAYANAN UNTUK NAVBAR / LAYOUT
        |--------------------------------------------------------------------------
        */

        $layanan = Layanan::orderBy('id')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | KIRIM DATA KE HALAMAN DETAIL BERITA
        |--------------------------------------------------------------------------
        */

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
        $layanan = Layanan::orderBy('id')
            ->get();

        return view('landing.layanan', compact(
            'layanan'
        ));
    }


    /**
     * =========================================================
     * HALAMAN KONTAK
     * =========================================================
     */
    public function kontak()
    {
        $layanan = Layanan::orderBy('id')
            ->get();

        return view('landing.kontak', compact(
            'layanan'
        ));
    }


    /**
     * =========================================================
     * PENCARIAN
     * =========================================================
     */
    public function pencarian(Request $request)
    {
        $keyword = trim($request->search);


        /*
        |--------------------------------------------------------------------------
        | JIKA PENCARIAN KOSONG
        |--------------------------------------------------------------------------
        */

        if ($keyword === '') {

            return redirect()->route('landing.berita');

        }


        /*
        |--------------------------------------------------------------------------
        | CARI LAYANAN
        |--------------------------------------------------------------------------
        */

        $layanan = Layanan::where('judul', 'like', '%' . $keyword . '%')
            ->orWhere('isi', 'like', '%' . $keyword . '%')
            ->orderBy('id')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | CARI BERITA
        |--------------------------------------------------------------------------
        */

        $berita = Berita::where('judul', 'like', '%' . $keyword . '%')
            ->orWhere('isi', 'like', '%' . $keyword . '%')
            ->latest()
            ->get();


        /*
        |--------------------------------------------------------------------------
        | DATA LAYANAN UNTUK NAVBAR
        |--------------------------------------------------------------------------
        */

        $dataLayanan = Layanan::orderBy('id')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | HASIL PENCARIAN
        |--------------------------------------------------------------------------
        */

        return view('landing.pencarian', compact(
            'keyword',
            'layanan',
            'berita',
            'dataLayanan'
        ));
    }
}