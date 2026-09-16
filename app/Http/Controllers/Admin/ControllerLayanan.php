<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ControllerLayanan 
{
    /**
     * =========================================================
     * DAFTAR LAYANAN
     * =========================================================
     */
    public function index(Request $request)
    {
        $query = Layanan::query();

        /*
        |--------------------------------------------------------------------------
        | PENCARIAN
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('judul', 'like', '%' . $search . '%')
                  ->orWhere('isi', 'like', '%' . $search . '%');

            });
        }


        /*
        |--------------------------------------------------------------------------
        | DATA LAYANAN
        |--------------------------------------------------------------------------
        */

        $layanan = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();


        return view(
            'admin.layanan.index',
            compact('layanan')
        );
    }


    /**
     * =========================================================
     * FORM TAMBAH
     * =========================================================
     */
    public function create()
    {
        return view('admin.layanan.create');
    }


    /**
     * =========================================================
     * SIMPAN LAYANAN
     * =========================================================
     */
    public function store(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | VALIDASI
        |--------------------------------------------------------------------------
        */

        $request->validate([

            'judul' => [
                'required',
                'string',
                'max:255'
            ],

            'isi' => [
                'required',
                'string'
            ],

            'foto' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048'
            ],

        ]);


        /*
        |--------------------------------------------------------------------------
        | BUAT SLUG
        |--------------------------------------------------------------------------
        */

        $slug = Str::slug($request->judul);

        $slugAwal = $slug;

        $counter = 1;


        /*
        |--------------------------------------------------------------------------
        | CEK SLUG DUPLIKAT
        |--------------------------------------------------------------------------
        */

        while (
            Layanan::where('slug', $slug)->exists()
        ) {

            $slug = $slugAwal . '-' . $counter;

            $counter++;
        }


        /*
        |--------------------------------------------------------------------------
        | UPLOAD FOTO
        |--------------------------------------------------------------------------
        */

        $namaFoto = null;

        if ($request->hasFile('foto')) {

            $folder = public_path('layanan');


            if (!File::exists($folder)) {

                File::makeDirectory(
                    $folder,
                    0755,
                    true
                );

            }


            $file = $request->file('foto');


            $namaFoto =
                time() .
                '_' .
                Str::slug(
                    pathinfo(
                        $file->getClientOriginalName(),
                        PATHINFO_FILENAME
                    )
                ) .
                '.' .
                $file->getClientOriginalExtension();


            $file->move(
                $folder,
                $namaFoto
            );
        }


        /*
        |--------------------------------------------------------------------------
        | SIMPAN
        |--------------------------------------------------------------------------
        */

        Layanan::create([

            'judul' => $request->judul,

            'slug' => $slug,

            'isi' => $request->isi,

            'foto' => $namaFoto,

        ]);


        /*
        |--------------------------------------------------------------------------
        | REDIRECT
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('admin.layanan.index')
            ->with(
                'success',
                'Layanan berhasil ditambahkan.'
            );
    }


    /**
     * =========================================================
     * FORM EDIT
     * =========================================================
     */
    public function edit($id)
    {
        $layanan = Layanan::findOrFail($id);


        return view(
            'admin.layanan.edit',
            compact('layanan')
        );
    }


    /**
     * =========================================================
     * UPDATE LAYANAN
     * =========================================================
     */
    public function update(
        Request $request,
        $id
    ) {

        $layanan = Layanan::findOrFail($id);


        /*
        |--------------------------------------------------------------------------
        | VALIDASI
        |--------------------------------------------------------------------------
        */

        $request->validate([

            'judul' => [
                'required',
                'string',
                'max:255'
            ],

            'isi' => [
                'required',
                'string'
            ],

            'foto' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048'
            ],

        ]);


        /*
        |--------------------------------------------------------------------------
        | BUAT SLUG
        |--------------------------------------------------------------------------
        */

        $slug = Str::slug($request->judul);

        $slugAwal = $slug;

        $counter = 1;


        /*
        |--------------------------------------------------------------------------
        | CEK SLUG
        |--------------------------------------------------------------------------
        */

        while (

            Layanan::where('slug', $slug)
                ->where('id', '!=', $layanan->id)
                ->exists()

        ) {

            $slug = $slugAwal . '-' . $counter;

            $counter++;
        }


        /*
        |--------------------------------------------------------------------------
        | DATA UPDATE
        |--------------------------------------------------------------------------
        */

        $data = [

            'judul' => $request->judul,

            'slug' => $slug,

            'isi' => $request->isi,

        ];


        /*
        |--------------------------------------------------------------------------
        | FOTO BARU
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('foto')) {

            $folder = public_path('layanan');


            if (!File::exists($folder)) {

                File::makeDirectory(
                    $folder,
                    0755,
                    true
                );

            }


            /*
            | Hapus foto lama
            */

            if (
                $layanan->foto &&
                File::exists(
                    $folder .
                    DIRECTORY_SEPARATOR .
                    $layanan->foto
                )
            ) {

                File::delete(
                    $folder .
                    DIRECTORY_SEPARATOR .
                    $layanan->foto
                );
            }


            /*
            | Simpan foto baru
            */

            $file = $request->file('foto');


            $namaFoto =
                time() .
                '_' .
                Str::slug(
                    pathinfo(
                        $file->getClientOriginalName(),
                        PATHINFO_FILENAME
                    )
                ) .
                '.' .
                $file->getClientOriginalExtension();


            $file->move(
                $folder,
                $namaFoto
            );


            $data['foto'] = $namaFoto;
        }


        /*
        |--------------------------------------------------------------------------
        | UPDATE DATABASE
        |--------------------------------------------------------------------------
        */

        $layanan->update($data);


        /*
        |--------------------------------------------------------------------------
        | REDIRECT
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('admin.layanan.index')
            ->with(
                'success',
                'Layanan berhasil diperbarui.'
            );
    }


    /**
     * =========================================================
     * HAPUS LAYANAN
     * =========================================================
     */
    public function destroy($id)
    {
        $layanan = Layanan::findOrFail($id);


        /*
        |--------------------------------------------------------------------------
        | HAPUS FOTO
        |--------------------------------------------------------------------------
        */

        if ($layanan->foto) {

            $path = public_path(
                'layanan' .
                DIRECTORY_SEPARATOR .
                $layanan->foto
            );


            if (File::exists($path)) {

                File::delete($path);

            }
        }


        /*
        |--------------------------------------------------------------------------
        | HAPUS DATA
        |--------------------------------------------------------------------------
        */

        $layanan->delete();


        /*
        |--------------------------------------------------------------------------
        | REDIRECT
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('admin.layanan.index')
            ->with(
                'success',
                'Layanan berhasil dihapus.'
            );
    }
}
