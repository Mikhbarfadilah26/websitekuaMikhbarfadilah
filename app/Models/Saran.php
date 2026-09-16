<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saran extends Model
{
    use HasFactory;

    /**
     * Nama tabel
     */
    protected $table = 'saran';

    /**
     * Kolom yang boleh diisi
     */
    protected $fillable = [
        'user_id',
        'isi_saran',
        'status',
        'balasan',
    ];

    /**
     * Relasi ke user
     *
     * Menggunakan ModelUser karena
     * model User.php tidak digunakan di project ini.
     */
    public function user()
    {
        return $this->belongsTo(ModelUser::class, 'user_id');
    }
}
