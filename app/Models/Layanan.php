<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Layanan extends Model
{
    protected $table = 'layanan';

    protected $fillable = [
        'judul',
        'slug',
        'isi',
        'gambar',
    ];

    /**
     * Relasi ke tabel persyaratan
     */
    public function persyaratan(): HasMany
    {
        return $this->hasMany(Persyaratan::class, 'layanan_id', 'id');
    }
}