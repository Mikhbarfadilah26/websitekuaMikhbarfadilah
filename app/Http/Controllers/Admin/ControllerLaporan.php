<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ControllerLaporan 
{
    /**
     * Halaman utama laporan admin.
     */
    public function index()
    {
        return view('admin.laporan.index');
    }
}
