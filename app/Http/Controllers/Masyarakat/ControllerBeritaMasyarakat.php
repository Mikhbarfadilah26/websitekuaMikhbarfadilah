<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use App\Models\Berita;

class ControllerBeritaMasyarakat 
{
    /**
     * Menampilkan semua berita.
     */
    public function index()
    {
        $beritas = Berita::latest()->get();

        return view(
            'masyarakat.berita.index',
            compact('beritas')
        );
    }


    /**
     * Menampilkan detail berita.
     */
    public function show($slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();

        return view(
            'masyarakat.berita.show',
            compact('berita')
        );
    }
}