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
        | Mengambil 4 berita terbaru dan tidak menampilkan
        | berita yang sedang dibuka.
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
        | HALAMAN DETAIL BERITA
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
     * HALAMAN PERSYARATAN
     * =========================================================
     */
    public function persyaratan()
    {
        /*
        |--------------------------------------------------------------------------
        | AMBIL LAYANAN PENCATATAN NIKAH DAN RUJUK
        |--------------------------------------------------------------------------
        |
        | Berdasarkan database:
        | ID 1 = Pencatatan Nikah dan Rujuk
        |
        | Sekaligus mengambil seluruh persyaratan
        | yang mempunyai layanan_id = 1.
        |
        */

        $layanan = Layanan::with('persyaratan')
            ->findOrFail(1);


        /*
        |--------------------------------------------------------------------------
        | DATA LAYANAN
        |--------------------------------------------------------------------------
        |
        | Data ini tetap dikirim apabila navbar/layout kamu
        | membutuhkan daftar layanan.
        |
        */

        $dataLayanan = Layanan::orderBy('id')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | HALAMAN PERSYARATAN
        |--------------------------------------------------------------------------
        */

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
        $layanan = Layanan::orderBy('id')
            ->get();

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
        /*
        |--------------------------------------------------------------------------
        | AMBIL KATA KUNCI
        |--------------------------------------------------------------------------
        */

        $keyword = trim($request->get('search', ''));


        /*
        |--------------------------------------------------------------------------
        | JIKA PENCARIAN KOSONG
        |--------------------------------------------------------------------------
        */

        if ($keyword === '') {

            return redirect()->route('landing.index');

        }


        /*
        |--------------------------------------------------------------------------
        | CARI LAYANAN
        |--------------------------------------------------------------------------
        |
        | Pencarian dilakukan pada:
        | - judul
        | - isi
        |
        */

        $layanan = Layanan::where(function ($query) use ($keyword) {

                $query->where('judul', 'like', '%' . $keyword . '%')
                    ->orWhere('isi', 'like', '%' . $keyword . '%');

            })
            ->orderBy('id')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | CARI BERITA
        |--------------------------------------------------------------------------
        |
        | Pencarian dilakukan pada:
        | - judul
        | - isi
        |
        */

        $berita = Berita::where(function ($query) use ($keyword) {

                $query->where('judul', 'like', '%' . $keyword . '%')
                    ->orWhere('isi', 'like', '%' . $keyword . '%');

            })
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
        | TOTAL HASIL PENCARIAN
        |--------------------------------------------------------------------------
        */

        $totalHasil = $layanan->count() + $berita->count();


        /*
        |--------------------------------------------------------------------------
        | KIRIM HASIL KE VIEW
        |--------------------------------------------------------------------------
        */

        return view('landing.pencarian', compact(
            'keyword',
            'layanan',
            'berita',
            'dataLayanan',
            'totalHasil'
        ));
    }
}
