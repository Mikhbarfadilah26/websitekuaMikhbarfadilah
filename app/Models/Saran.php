<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Saran extends Model
{
    protected $table = 'saran';

    protected $fillable = [
        'user_id',
        'isi_saran',
        'status',
        'tanggapan',
    ];

    /**
     * Saran milik satu user.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(ModelUser::class, 'user_id');
    }
}