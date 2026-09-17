<?php

use Illuminate\Support\Facades\Route;

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
| AUTHENTICATION
|--------------------------------------------------------------------------
*/

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
|
| Register dapat diakses sebelum login.
|
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

    // =====================================================
    // AKUN SAYA
    // =====================================================

    Route::get('/admin/akun', [
        ControllerAkun::class,
        'index'
    ])->name('admin.akun.index');

    Route::put('/admin/akun', [
        ControllerAkun::class,
        'update'
    ])->name('admin.akun.update');
    Route::get('/admin/laporan', [ControllerLaporan::class, 'index'])
        ->name('admin.laporan.index');

    /*
|--------------------------------------------------------------------------
| SARAN & PENGADUAN - PUBLIC
|--------------------------------------------------------------------------
*/
    Route::get(
        '/saran',
        [
            SaranController::class,
            'create'
        ]
    )->name('landing.saran.create');
    Route::post(
        '/saran',
        [
            SaranController::class,
            'store'
        ]
    )->name('landing.saran.store');


    Route::get('/masyarakat', [ControllerMasyarakat::class, 'index'])
        ->name('admin.masyarakat.index');

    Route::get('/masyarakat/create', [ControllerMasyarakat::class, 'create'])
        ->name('admin.masyarakat.create');

    Route::post('/masyarakat', [ControllerMasyarakat::class, 'store'])
        ->name('admin.masyarakat.store');

    Route::get('/masyarakat/{masyarakat}/edit', [ControllerMasyarakat::class, 'edit'])
        ->name('admin.masyarakat.edit');

    Route::put('/masyarakat/{masyarakat}', [ControllerMasyarakat::class, 'update'])
        ->name('admin.masyarakat.update');

    Route::delete('/masyarakat/{masyarakat}', [ControllerMasyarakat::class, 'destroy'])
        ->name('admin.masyarakat.destroy');

    Route::patch('/masyarakat/{masyarakat}/setujui', [ControllerMasyarakat::class, 'setujui'])
        ->name('admin.masyarakat.setujui');

    Route::patch('/masyarakat/{masyarakat}/tolak', [ControllerMasyarakat::class, 'tolak'])
        ->name('admin.masyarakat.tolak');


    /*
    |--------------------------------------------------------------------------
    | CRUD BERITA ADMIN
    |--------------------------------------------------------------------------
    |
    | URL:
    | /admin/berita
    |
    */

    Route::prefix('admin')
        ->name('admin.')
        ->group(function () {

            Route::resource(
                'berita',
                ControllerBerita::class
            )->except(['show']);
        });


    /*
    |--------------------------------------------------------------------------
    | CRUD LAYANAN ADMIN
    |--------------------------------------------------------------------------
    |
    | URL:
    | /admin/layanan
    |
    | Menggunakan alias AdminControllerLayanan
    | agar tidak bentrok dengan ControllerLayanan
    | milik landing.
    |
    */

    Route::prefix('admin')
        ->name('admin.')
        ->group(function () {

            Route::resource(
                'layanan',
                AdminControllerLayanan::class
            )->except(['show']);
        });


    /*
    |--------------------------------------------------------------------------
    | SARAN & PENGADUAN ADMIN
    |--------------------------------------------------------------------------
    */


    /*
    | Daftar saran
    */

    Route::get('/admin/saran', [
        ControllerSaran::class,
        'index'
    ])->name('admin.saran.index');


    /*
    | Detail saran
    */

    Route::get('/admin/saran/{id}', [
        ControllerSaran::class,
        'show'
    ])->name('admin.saran.show');


    /*
    | Balas saran
    */

    Route::post('/admin/saran/{id}/balas', [
        ControllerSaran::class,
        'balas'
    ])->name('admin.saran.balas');


    /*
    | Hapus saran
    */

    Route::delete('/admin/saran/{id}', [
        ControllerSaran::class,
        'destroy'
    ])->name('admin.saran.destroy');
});


/*
|--------------------------------------------------------------------------
| DASHBOARD MASYARAKAT
|--------------------------------------------------------------------------
|
| Setelah login sebagai masyarakat,
| ControllerAuthUser mengarahkan ke:
|
| masyarakat.dashboard
|
*/

Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD MASYARAKAT
    |--------------------------------------------------------------------------
    */

    Route::get('/masyarakat/dashboard', [
        ControllerDashboardmasyarakat::class,
        'index'
    ])->name('masyarakat.dashboard');
});
