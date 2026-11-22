<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permohonan; // Sesuaikan dengan nama Model pengajuan Anda
use Illuminate\Http\Request;

class ControllerPengajuan 
{
    public function index()
    {
        $daftarPengajuan = Permohonan::with('user')
            ->latest()
            ->paginate(10);

        return view('admin.pengajuan.index', compact('daftarPengajuan'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,disetujui,ditolak,selesai',
            'catatan_admin' => 'nullable|string|max:1000',
        ]);

        $pengajuan = Permohonan::findOrFail($id);
        $pengajuan->update([
            'status' => $request->status,
            // 'catatan_admin' => $request->catatan_admin, // Aktifkan jika ada kolom catatan_admin di tabel
        ]);

        return back()->with('success', 'Status pengajuan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pengajuan = Permohonan::findOrFail($id);
        $pengajuan->delete();

        return back()->with('success', 'Data pengajuan berhasil dihapus.');
    }
}