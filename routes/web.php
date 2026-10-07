<?php

use Illuminate\Support\Facades\Route;
use App\Models\Layanan;


/*
|--------------------------------------------------------------------------
| CONTROLLER LANDING
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Admin\ControllerAkun;
use App\Http\Controllers\Landing\ControllerLanding;
use App\Http\Controllers\ControllerLayanan;


/*
|--------------------------------------------------------------------------
| CONTROLLER SARAN
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Admin\ControllerSaran;
use App\Http\Controllers\Saran\SaranController;


/*
|--------------------------------------------------------------------------
| CONTROLLER AUTH
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Auth\ControllerAuthUser;
use App\Http\Controllers\Auth\ControllerRegisterUser;
use App\Http\Controllers\Admin\ControllerMasyarakat;


/*
|--------------------------------------------------------------------------
| CONTROLLER DASHBOARD
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Dashboard\ControllerDashboardAdmin;
use App\Http\Controllers\Dashboard\ControllerDashboardmasyarakat;


/*
|--------------------------------------------------------------------------
| CONTROLLER ADMIN
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Admin\ControllerBerita;
use App\Http\Controllers\Admin\ControllerLayanan as AdminControllerLayanan;
use App\Http\Controllers\Admin\ControllerLaporan;
use App\Http\Controllers\Admin\ControllerPersyaratan;


/*
|--------------------------------------------------------------------------
| LANDING / BERANDA
|--------------------------------------------------------------------------
*/

Route::get('/', [
    ControllerLanding::class,
    'index'
])->name('landing');


Route::get('/beranda', [
    ControllerLanding::class,
    'index'
])->name('landing.beranda');


/*
|--------------------------------------------------------------------------
| LAYANAN LANDING
|--------------------------------------------------------------------------
*/

Route::get('/layanan', [
    ControllerLanding::class,
    'layanan'
])->name('landing.layanan');


Route::get('/layanan/{id}', [
    ControllerLayanan::class,
    'show'
])->name('layanan.show');


/*
|--------------------------------------------------------------------------
| PERSYARATAN LANDING
|--------------------------------------------------------------------------
*/

Route::get('/persyaratan', [
    ControllerLanding::class,
    'persyaratan'
])->name('landing.persyaratan');


/*
|--------------------------------------------------------------------------
| PROFIL
|--------------------------------------------------------------------------
*/

Route::get('/tentang', [
    ControllerLanding::class,
    'tentang'
])->name('landing.tentang');


Route::get('/visi-misi', [
    ControllerLanding::class,
    'visimisi'
])->name('landing.visimisi');


Route::view('/sejarah', 'landing.sejarah')
    ->name('landing.sejarah');


Route::view('/struktur-organisasi', 'landing.struktur-organisasi')
    ->name('landing.struktur-organisasi');


/*
|--------------------------------------------------------------------------
| BERITA LANDING
|--------------------------------------------------------------------------
*/

Route::get('/berita', [
    ControllerLanding::class,
    'berita'
])->name('landing.berita');


Route::get('/berita/{slug}', [
    ControllerLanding::class,
    'detailBerita'
])->name('berita.detail');


/*
|--------------------------------------------------------------------------
| KONTAK
|--------------------------------------------------------------------------
*/

Route::get('/kontak', [
    ControllerLanding::class,
    'kontak'
])->name('landing.kontak');


/*
|--------------------------------------------------------------------------
| PENCARIAN
|--------------------------------------------------------------------------
*/

Route::get('/pencarian', [
    ControllerLanding::class,
    'pencarian'
])->name('landing.pencarian');


/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/

Route::get('/login', [
    ControllerAuthUser::class,
    'index'
])->name('login');


Route::post('/login', [
    ControllerAuthUser::class,
    'login'
])->name('login.proses');


/*
|--------------------------------------------------------------------------
| LOGOUT
|--------------------------------------------------------------------------
*/

Route::post('/logout', [
    ControllerAuthUser::class,
    'logout'
])->name('logout');


/*
|--------------------------------------------------------------------------
| REGISTER MASYARAKAT
|--------------------------------------------------------------------------
*/

Route::get('/register', [
    ControllerRegisterUser::class,
    'index'
])->name('register');


Route::post('/register', [
    ControllerRegisterUser::class,
    'register'
])->name('register.proses');


/*
|--------------------------------------------------------------------------
| ROUTE ADMIN
|--------------------------------------------------------------------------
|
| Semua route admin membutuhkan autentikasi.
|
*/

Route::middleware(['auth'])->group(function () {


    /*
    |--------------------------------------------------------------------------
    | DASHBOARD ADMIN
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/dashboard', [
        ControllerDashboardAdmin::class,
        'index'
    ])->name('admin.dashboard');


    /*
    |--------------------------------------------------------------------------
    | AKUN SAYA
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/akun', [
        ControllerAkun::class,
        'index'
    ])->name('admin.akun.index');


    Route::put('/admin/akun', [
        ControllerAkun::class,
        'update'
    ])->name('admin.akun.update');


    /*
    |--------------------------------------------------------------------------
    | LAPORAN
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/laporan', [
        ControllerLaporan::class,
        'index'
    ])->name('admin.laporan.index');


    /*
    |--------------------------------------------------------------------------
    | KELOLA MASYARAKAT
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/masyarakat', [
        ControllerMasyarakat::class,
        'index'
    ])->name('admin.masyarakat.index');


    Route::get('/admin/masyarakat/create', [
        ControllerMasyarakat::class,
        'create'
    ])->name('admin.masyarakat.create');


    Route::post('/admin/masyarakat', [
        ControllerMasyarakat::class,
        'store'
    ])->name('admin.masyarakat.store');


    Route::get('/admin/masyarakat/{masyarakat}/edit', [
        ControllerMasyarakat::class,
        'edit'
    ])->name('admin.masyarakat.edit');


    Route::put('/admin/masyarakat/{masyarakat}', [
        ControllerMasyarakat::class,
        'update'
    ])->name('admin.masyarakat.update');


    Route::delete('/admin/masyarakat/{masyarakat}', [
        ControllerMasyarakat::class,
        'destroy'
    ])->name('admin.masyarakat.destroy');


    Route::patch('/admin/masyarakat/{masyarakat}/setujui', [
        ControllerMasyarakat::class,
        'setujui'
    ])->name('admin.masyarakat.setujui');


    Route::patch('/admin/masyarakat/{masyarakat}/tolak', [
        ControllerMasyarakat::class,
        'tolak'
    ])->name('admin.masyarakat.tolak');


    /*
    |--------------------------------------------------------------------------
    | ADMIN CRUD
    |--------------------------------------------------------------------------
    |
    | Semua route di dalam group ini otomatis:
    |
    | /admin/...
    |
    | admin....
    |
    */

    Route::prefix('admin')
        ->name('admin.')
        ->group(function () {


            /*
            |--------------------------------------------------------------------------
            | CRUD BERITA
            |--------------------------------------------------------------------------
            */

            Route::resource(
                'berita',
                ControllerBerita::class
            )->except(['show']);


            /*
            |--------------------------------------------------------------------------
            | CRUD LAYANAN
            |--------------------------------------------------------------------------
            */

            Route::resource(
                'layanan',
                AdminControllerLayanan::class
            )->except(['show']);


            /*
            |--------------------------------------------------------------------------
            | CRUD PERSYARATAN
            |--------------------------------------------------------------------------
            */

            Route::resource(
                'persyaratan',
                ControllerPersyaratan::class
            )->except(['show']);

        });


    /*
    |--------------------------------------------------------------------------
    | SARAN & PENGADUAN
    |--------------------------------------------------------------------------
    |
    | PUBLIC FORM
    |
    */

    Route::get('/saran', [
        SaranController::class,
        'create'
    ])->name('landing.saran.create');


    Route::post('/saran', [
        SaranController::class,
        'store'
    ])->name('landing.saran.store');


    /*
    |--------------------------------------------------------------------------
    | ADMIN SARAN & PENGADUAN
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/saran', [
        ControllerSaran::class,
        'index'
    ])->name('admin.saran.index');


    Route::get('/admin/saran/{id}', [
        ControllerSaran::class,
        'show'
    ])->name('admin.saran.show');


    Route::post('/admin/saran/{id}/balas', [
        ControllerSaran::class,
        'balas'
    ])->name('admin.saran.balas');


    Route::delete('/admin/saran/{id}', [
        ControllerSaran::class,
        'destroy'
    ])->name('admin.saran.destroy');

});


/*
|--------------------------------------------------------------------------
| DASHBOARD MASYARAKAT
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/masyarakat/dashboard', [
        ControllerDashboardmasyarakat::class,
        'index'
    ])->name('masyarakat.dashboard');

});
