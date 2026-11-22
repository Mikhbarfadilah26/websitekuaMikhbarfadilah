<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Permohonan extends Model
{
    protected $table = 'permohonan';

    protected $guarded = ['id'];

    protected $casts = [
        'tanggal_pengajuan' => 'date',
    ];

    public function user(): BelongsTo
    {
        // Diubah dari User::class menjadi ModelUser::class
        return $this->belongsTo(ModelUser::class, 'user_id');
    }

    public function layanan(): BelongsTo
    {
        return $this->belongsTo(Layanan::class, 'layanan_id');
    }
}