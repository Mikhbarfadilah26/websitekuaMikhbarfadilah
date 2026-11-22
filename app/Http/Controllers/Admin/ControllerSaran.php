<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Saran;
use Illuminate\Http\Request;

class ControllerSaran 
{
    public function index(Request $request)
    {
        $query = Saran::with('user');

        // Fitur pencarian berdasarkan isi saran atau nama pengirim
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('isi_saran', 'like', '%' . $search . '%')
                  ->orWhere('pesan', 'like', '%' . $search . '%')
                  ->orWhereHas('user', function ($qUser) use ($search) {
                      $qUser->where('nama', 'like', '%' . $search . '%')
                            ->orWhere('name', 'like', '%' . $search . '%')
                            ->orWhere('email', 'like', '%' . $search . '%');
                  });
            });
        }

        // Filter berdasarkan status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $saran = $query->latest()->paginate(10)->withQueryString();

        return view('admin.saran.index', compact('saran'));
    }

    public function show($id)
    {
        // Menampilkan detail satu saran/pengaduan
        $saran = Saran::with('user')->findOrFail($id);

        // Jika statusnya masih 'baru', otomatis ubah menjadi 'dibaca'
        if ($saran->status === 'baru') {
            $saran->update(['status' => 'dibaca']);
        }

        return view('admin.saran.show', compact('saran'));
    }

    public function balas(Request $request, $id)
    {
        $request->validate([
            'tanggapan' => 'required|string|max:2000',
        ], [
            'tanggapan.required' => 'Tanggapan/balasan tidak boleh kosong.',
            'tanggapan.max'      => 'Tanggapan maksimal 2000 karakter.',
        ]);

        $saran = Saran::findOrFail($id);
        
        $saran->update([
            'tanggapan' => $request->tanggapan,
            'status'    => 'dibalas',
        ]);

        return back()->with('success', 'Balasan berhasil dikirim kepada masyarakat.');
    }

    public function destroy($id)
    {
        $saran = Saran::findOrFail($id);
        $saran->delete();

        return redirect()
            ->route('admin.saran.index')
            ->with('success', 'Data saran berhasil dihapus.');
    }
}