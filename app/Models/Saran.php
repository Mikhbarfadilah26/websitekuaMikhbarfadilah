<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Saran extends Model
{
    use HasFactory;

    /*
    |--------------------------------------------------------------------------
    | Nama Tabel
    |--------------------------------------------------------------------------
    */
    protected $table = 'saran';

    /*
    |--------------------------------------------------------------------------
    | Kolom Yang Boleh Diisi
    |--------------------------------------------------------------------------
    */
    protected $fillable = [
        'user_id',
        'berita_id',
        'isi_saran',
        'status',
        'tanggapan',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relasi Ke ModelUser
    |--------------------------------------------------------------------------
    */
    public function user(): BelongsTo
    {
        return $this->belongsTo(ModelUser::class, 'user_id');
    }

    /*
    |--------------------------------------------------------------------------
    | Relasi Ke Berita
    |--------------------------------------------------------------------------
    */
    public function berita(): BelongsTo
    {
        return $this->belongsTo(Berita::class, 'berita_id');
    }
}