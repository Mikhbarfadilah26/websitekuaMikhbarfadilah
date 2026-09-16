<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    /*
    |--------------------------------------------------------------------------
    | NAMA TABLE
    |--------------------------------------------------------------------------
    |
    | Laravel otomatis menggunakan tabel "layanans".
    | Jika tabel database Anda bernama "layanan" (tanpa s),
    | gunakan protected $table = 'layanan';
    |
    */

    protected $table = 'layanan';


    /*
    |--------------------------------------------------------------------------
    | MASS ASSIGNMENT
    |--------------------------------------------------------------------------
    */

    protected $fillable = [

        'judul',

        'slug',

        'isi',

        'foto',

    ];
}
