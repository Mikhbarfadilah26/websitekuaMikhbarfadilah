<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KomentarBerita extends Model
{
    protected $table = 'komentar_berita';

    protected $fillable = [
        'berita_id',
        'user_id',
        'isi_komentar',
        'tanggapan',
    ];

    // Relasi komentar dengan berita
    // Satu komentar hanya milik satu berita
    public function berita()
    {
        return $this->belongsTo(Berita::class, 'berita_id', 'id');
    }

    // Relasi komentar dengan pengguna
    // Satu komentar dibuat oleh satu pengguna
    public function user()
    {
        return $this->belongsTo(ModelUser::class, 'user_id', 'id');
    }
}