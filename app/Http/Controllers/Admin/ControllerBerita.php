<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ControllerBerita 
{
    /**
     * Menampilkan semua berita
     */
    public function index(Request $request)
    {
        $query = Berita::query();

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', '%' . $search . '%')
                  ->orWhere('isi', 'like', '%' . $search . '%');
            });
        }

        $berita = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.berita.index', compact('berita'));
    }

    /**
     * Form tambah berita
     */
    public function create()
    {
        return view('admin.berita.create');
    }

    /**
     * Simpan berita
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi'   => 'required|string',
            'foto'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ], [
            'judul.required' => 'Judul berita wajib diisi.',
            'isi.required'   => 'Isi berita wajib diisi.',
            'foto.image'     => 'File harus berupa gambar.',
            'foto.mimes'     => 'Format gambar harus JPG, JPEG, PNG, atau WEBP.',
            'foto.max'       => 'Ukuran gambar maksimal 2 MB.',
        ]);

        $foto = null;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');

            $namaFoto = time() . '_' . Str::slug($request->judul)
                . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('berita'), $namaFoto);

            $foto = $namaFoto;
        }

        Berita::create([
            'judul' => $request->judul,
            'slug'  => Str::slug($request->judul),
            'isi'   => $request->isi,
            'foto'  => $foto,
        ]);

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil ditambahkan.');
    }

    /**
     * Form edit berita
     */
    public function edit($id)
    {
        $berita = Berita::findOrFail($id);

        return view('admin.berita.edit', compact('berita'));
    }

    /**
     * Update berita
     */
    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'isi'   => 'required|string',
            'foto'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ], [
            'judul.required' => 'Judul berita wajib diisi.',
            'isi.required'   => 'Isi berita wajib diisi.',
            'foto.image'     => 'File harus berupa gambar.',
            'foto.mimes'     => 'Format gambar harus JPG, JPEG, PNG, atau WEBP.',
            'foto.max'       => 'Ukuran gambar maksimal 2 MB.',
        ]);

        $data = [
            'judul' => $request->judul,
            'slug'  => Str::slug($request->judul),
            'isi'   => $request->isi,
        ];

        if ($request->hasFile('foto')) {

            // Hapus foto lama
            if (
                $berita->foto &&
                file_exists(public_path('berita/' . $berita->foto))
            ) {
                unlink(public_path('berita/' . $berita->foto));
            }

            $file = $request->file('foto');

            $namaFoto = time() . '_' . Str::slug($request->judul)
                . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('berita'), $namaFoto);

            $data['foto'] = $namaFoto;
        }

        $berita->update($data);

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil diperbarui.');
    }

    /**
     * Hapus berita
     */
    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);

        if (
            $berita->foto &&
            file_exists(public_path('berita/' . $berita->foto))
        ) {
            unlink(public_path('berita/' . $berita->foto));
        }

        $berita->delete();

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil dihapus.');
    }
}