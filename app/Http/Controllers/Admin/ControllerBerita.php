<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ControllerBerita 
{
    /**
     * Folder penyimpanan foto berita
     */
    private function folderFoto()
    {
        $folder = public_path('foto/berita');

        if (!is_dir($folder)) {
            mkdir($folder, 0755, true);
        }

        return $folder;
    }

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

            $namaFoto = Str::uuid() . '.' . $file->extension();

            $file->move(
                $this->folderFoto(),
                $namaFoto
            );

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
            $file = $request->file('foto');

            $namaFoto = Str::uuid() . '.' . $file->extension();

            $file->move(
                $this->folderFoto(),
                $namaFoto
            );

            // Hapus foto lama setelah foto baru berhasil diunggah
            if ($berita->foto) {
                $fotoLama = $this->folderFoto()
                    . DIRECTORY_SEPARATOR
                    . basename($berita->foto);

                if (is_file($fotoLama)) {
                    unlink($fotoLama);
                }
            }

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

        if ($berita->foto) {
            $pathFoto = public_path(
                'foto/berita/' . basename($berita->foto)
            );

            if (is_file($pathFoto)) {
                unlink($pathFoto);
            }
        }

        $berita->delete();

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil dihapus.');
    }
}