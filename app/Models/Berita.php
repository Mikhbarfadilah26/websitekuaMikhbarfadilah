<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'beritas';

    protected $fillable = [
        'judul',
        'slug',
        'isi',
        'foto',
    ];

    // Relasi berita dengan komentar
    // Satu berita memiliki banyak komentar
    public function komentar()
    {
        return $this->hasMany(KomentarBerita::class, 'berita_id', 'id');
    }
}