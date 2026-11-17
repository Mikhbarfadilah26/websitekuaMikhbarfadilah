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
     * DAFTAR LAYANAN
     */
    public function index(Request $request)
    {
        $query = Layanan::query();

        // PENCARIAN LAYANAN
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', '%' . $search . '%')
                  ->orWhere('isi', 'like', '%' . $search . '%');
            });
        }

        // TAMPILKAN DATA
        $layanan = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.layanan.index', compact('layanan'));
    }

    /**
     * FORM TAMBAH LAYANAN
     */
    public function create()
    {
        return view('admin.layanan.create');
    }

    /**
     * SIMPAN LAYANAN
     */
    public function store(Request $request)
    {
        // VALIDASI INPUT
        $request->validate([
            'judul'  => 'required|string|max:255',
            'isi'    => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // MEMBUAT SLUG UNIK
        $slug = Str::slug($request->judul);
        $slugAwal = $slug;
        $counter = 1;

        while (Layanan::where('slug', $slug)->exists()) {
            $slug = $slugAwal . '-' . $counter;
            $counter++;
        }

        // UPLOAD GAMBAR KE PUBLIC/FOTO/LAYANAN
        $namaGambar = null;

        if ($request->hasFile('gambar')) {

            $folder = public_path('foto/layanan');

            // BUAT FOLDER JIKA BELUM ADA
            if (!File::exists($folder)) {
                File::makeDirectory($folder, 0755, true);
            }

            $file = $request->file('gambar');

            $namaGambar = time() . '_' .
                Str::slug(pathinfo(
                    $file->getClientOriginalName(),
                    PATHINFO_FILENAME
                )) . '.' .
                strtolower($file->getClientOriginalExtension());

            $file->move($folder, $namaGambar);
        }

        // SIMPAN KE DATABASE
        Layanan::create([
            'judul'  => $request->judul,
            'slug'   => $slug,
            'isi'    => $request->isi,
            'gambar' => $namaGambar,
        ]);

        return redirect()
            ->route('admin.layanan.index')
            ->with('success', 'Layanan berhasil ditambahkan.');
    }

    /**
     * FORM EDIT LAYANAN
     */
    public function edit($id)
    {
        $layanan = Layanan::findOrFail($id);

        return view('admin.layanan.edit', compact('layanan'));
    }

    /**
     * UPDATE LAYANAN
     */
    public function update(Request $request, $id)
    {
        $layanan = Layanan::findOrFail($id);

        // VALIDASI INPUT
        $request->validate([
            'judul'  => 'required|string|max:255',
            'isi'    => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // MEMBUAT SLUG UNIK
        $slug = Str::slug($request->judul);
        $slugAwal = $slug;
        $counter = 1;

        while (
            Layanan::where('slug', $slug)
                ->where('id', '!=', $layanan->id)
                ->exists()
        ) {
            $slug = $slugAwal . '-' . $counter;
            $counter++;
        }

        // DATA YANG DIPERBARUI
        $data = [
            'judul' => $request->judul,
            'slug'  => $slug,
            'isi'   => $request->isi,
        ];

        // JIKA ADMIN MENGUNGGAH GAMBAR BARU
        if ($request->hasFile('gambar')) {

            $folder = public_path('foto/layanan');

            // BUAT FOLDER JIKA BELUM ADA
            if (!File::exists($folder)) {
                File::makeDirectory($folder, 0755, true);
            }

            // HAPUS GAMBAR LAMA
            if ($layanan->gambar) {

                $gambarLama = $folder . DIRECTORY_SEPARATOR . $layanan->gambar;

                if (File::exists($gambarLama)) {
                    File::delete($gambarLama);
                }
            }

            // UPLOAD GAMBAR BARU
            $file = $request->file('gambar');

            $namaGambar = time() . '_' .
                Str::slug(pathinfo(
                    $file->getClientOriginalName(),
                    PATHINFO_FILENAME
                )) . '.' .
                strtolower($file->getClientOriginalExtension());

            $file->move($folder, $namaGambar);

            // SIMPAN NAMA GAMBAR BARU
            $data['gambar'] = $namaGambar;
        }

        // UPDATE DATABASE
        $layanan->update($data);

        return redirect()
            ->route('admin.layanan.index')
            ->with('success', 'Layanan berhasil diperbarui.');
    }

    /**
     * HAPUS LAYANAN
     */
    public function destroy($id)
    {
        $layanan = Layanan::findOrFail($id);

        // HAPUS FILE GAMBAR
        if ($layanan->gambar) {

            $path = public_path(
                'foto/layanan/' . $layanan->gambar
            );

            if (File::exists($path)) {
                File::delete($path);
            }
        }

        // HAPUS DATA DARI DATABASE
        $layanan->delete();

        return redirect()
            ->route('admin.layanan.index')
            ->with('success', 'Layanan berhasil dihapus.');
    }
}