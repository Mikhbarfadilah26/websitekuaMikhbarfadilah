<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Persyaratan extends Model
{
    use HasFactory;

    /*
    |--------------------------------------------------------------------------
    | NAMA TABLE
    |--------------------------------------------------------------------------
    */

    protected $table = 'persyaratan';


    /*
    |--------------------------------------------------------------------------
    | MASS ASSIGNMENT
    |--------------------------------------------------------------------------
    */

    protected $fillable = [
        'layanan_id',
        'nama_persyaratan',
        'keterangan',
    ];


    /*
    |--------------------------------------------------------------------------
    | RELASI KE LAYANAN
    |--------------------------------------------------------------------------
    |
    | Setiap persyaratan dimiliki oleh satu layanan.
    |
    */

    public function layanan(): BelongsTo
    {
        return $this->belongsTo(Layanan::class, 'layanan_id');
    }
}
