<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Persyaratan;
use App\Models\Layanan;
use Illuminate\Http\Request;

class ControllerPersyaratan
{
    public function index()
    {
        $persyaratan = Persyaratan::with('layanan')
            ->latest()
            ->get();

        return view('admin.persyaratan.index', compact('persyaratan'));
    }

    public function create()
    {
        $layanan = Layanan::orderBy('judul')->get();

        return view('admin.persyaratan.create', compact('layanan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'layanan_id' => 'required|exists:layanan,id',
            'nama_persyaratan' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ], [
            'layanan_id.required' => 'Layanan wajib dipilih.',
            'layanan_id.exists' => 'Layanan yang dipilih tidak valid.',
            'nama_persyaratan.required' => 'Nama persyaratan wajib diisi.',
        ]);

        Persyaratan::create([
            'layanan_id' => $request->layanan_id,
            'nama_persyaratan' => $request->nama_persyaratan,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()
            ->route('admin.persyaratan.index')
            ->with('success', 'Persyaratan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $persyaratan = Persyaratan::findOrFail($id);

        $layanan = Layanan::orderBy('judul')->get();

        return view('admin.persyaratan.edit', compact(
            'persyaratan',
            'layanan'
        ));
    }

    public function update(Request $request, $id)
    {
        $persyaratan = Persyaratan::findOrFail($id);

        $request->validate([
            'layanan_id' => 'required|exists:layanan,id',
            'nama_persyaratan' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ], [
            'layanan_id.required' => 'Layanan wajib dipilih.',
            'layanan_id.exists' => 'Layanan yang dipilih tidak valid.',
            'nama_persyaratan.required' => 'Nama persyaratan wajib diisi.',
        ]);

        $persyaratan->update([
            'layanan_id' => $request->layanan_id,
            'nama_persyaratan' => $request->nama_persyaratan,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()
            ->route('admin.persyaratan.index')
            ->with('success', 'Persyaratan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $persyaratan = Persyaratan::findOrFail($id);

        $persyaratan->delete();

        return redirect()
            ->route('admin.persyaratan.index')
            ->with('success', 'Persyaratan berhasil dihapus.');
    }
}
