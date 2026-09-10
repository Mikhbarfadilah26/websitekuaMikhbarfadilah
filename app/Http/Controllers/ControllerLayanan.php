<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ControllerLayanan
{
    /**
     * Menampilkan detail layanan
     */
    public function show($id)
    {
        // Ambil data layanan berdasarkan ID
        $layanan = DB::table('layanan')
            ->where('id', $id)
            ->first();

        // Jika data tidak ditemukan
        if (!$layanan) {
            abort(404);
        }

        // Ambil layanan lainnya
        $layananLainnya = DB::table('layanan')
            ->where('id', '!=', $id)
            ->orderBy('id', 'asc')
            ->get();

        return view('layanan.show', compact(
            'layanan',
            'layananLainnya'
        ));
    }
}