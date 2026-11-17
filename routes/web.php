
<?php

use Illuminate\Support\Facades\Route;

// =====================================================
// CONTROLLER LANDING
// =====================================================

use App\Http\Controllers\Landing\ControllerLanding;
use App\Http\Controllers\Landing\ControllerLayanan;

// =====================================================
// CONTROLLER AUTH
// =====================================================

use App\Http\Controllers\Auth\ControllerAuthUser;
use App\Http\Controllers\Auth\ControllerRegisterUser;

// =====================================================
// CONTROLLER DASHBOARD
// =====================================================

use App\Http\Controllers\Dashboard\ControllerDashboardAdmin;
use App\Http\Controllers\Dashboard\ControllerDashboardmasyarakat;

// =====================================================
// CONTROLLER MASYARAKAT
// =====================================================

use App\Http\Controllers\Masyarakat\ControllerProfilMasyarakat;
use App\Http\Controllers\Masyarakat\ControllerBeritaMasyarakat;
use App\Http\Controllers\Masyarakat\ControllerPermohonan;

// =====================================================
// CONTROLLER ADMIN
// =====================================================

use App\Http\Controllers\Admin\ControllerAkun;
use App\Http\Controllers\Admin\ControllerAdmin;
use App\Http\Controllers\Admin\ControllerMasyarakat;
use App\Http\Controllers\Admin\ControllerBerita;
use App\Http\Controllers\Admin\ControllerLayanan as AdminControllerLayanan;
use App\Http\Controllers\Admin\ControllerLaporan;
use App\Http\Controllers\Admin\ControllerPersyaratan;
use App\Http\Controllers\Admin\ControllerSaran;

// =====================================================
// CONTROLLER SARAN
// =====================================================

use App\Http\Controllers\Saran\SaranController;


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
| PROFIL LANDING
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
| LOGOUT
|--------------------------------------------------------------------------
*/

Route::post('/logout', [
    ControllerAuthUser::class,
    'logout'
])->middleware('auth')->name('logout');


/*
|--------------------------------------------------------------------------
| SARAN DAN PENGADUAN MASYARAKAT
|--------------------------------------------------------------------------
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
| ROUTE ADMIN
|--------------------------------------------------------------------------
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
    | AKUN ADMIN YANG SEDANG LOGIN
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
    | LAPORAN ADMIN
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/laporan', [
        ControllerLaporan::class,
        'index'
    ])->name('admin.laporan.index');


    /*
    |--------------------------------------------------------------------------
    | CRUD KELOLA ADMIN
    |--------------------------------------------------------------------------
    | Role akun: admin
    | Status akun: disetujui
    | Akun langsung aktif
    |--------------------------------------------------------------------------
    */

    Route::prefix('admin')
        ->name('admin.')
        ->group(function () {

            Route::resource(
                'akun-admin',
                ControllerAdmin::class
            )
            ->parameters([
                'akun-admin' => 'id'
            ])
            ->names([
                'index' => 'admin.index',
                'create' => 'admin.create',
                'store' => 'admin.store',
                'edit' => 'admin.edit',
                'update' => 'admin.update',
                'destroy' => 'admin.destroy',
            ])
            ->except(['show']);


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
    | CRUD KELOLA MASYARAKAT
    |--------------------------------------------------------------------------
    | Role akun: masyarakat
    | Status awal: pending
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
    ])->whereNumber('masyarakat')
      ->name('admin.masyarakat.edit');

    Route::put('/admin/masyarakat/{masyarakat}', [
        ControllerMasyarakat::class,
        'update'
    ])->whereNumber('masyarakat')
      ->name('admin.masyarakat.update');

    Route::delete('/admin/masyarakat/{masyarakat}', [
        ControllerMasyarakat::class,
        'destroy'
    ])->whereNumber('masyarakat')
      ->name('admin.masyarakat.destroy');


    /*
    |--------------------------------------------------------------------------
    | PERSETUJUAN MASYARAKAT
    |--------------------------------------------------------------------------
    */

    Route::patch('/admin/masyarakat/{masyarakat}/setujui', [
        ControllerMasyarakat::class,
        'setujui'
    ])->whereNumber('masyarakat')
      ->name('admin.masyarakat.setujui');

    Route::patch('/admin/masyarakat/{masyarakat}/tolak', [
        ControllerMasyarakat::class,
        'tolak'
    ])->whereNumber('masyarakat')
      ->name('admin.masyarakat.tolak');


    /*
    |--------------------------------------------------------------------------
    | ADMIN SARAN DAN PENGADUAN
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
| DASHBOARD DAN MODUL MASYARAKAT
|--------------------------------------------------------------------------
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


    /*
    |--------------------------------------------------------------------------
    | PROFIL MASYARAKAT
    |--------------------------------------------------------------------------
    */

    Route::get('/profil', [
        ControllerProfilMasyarakat::class,
        'index'
    ])->name('masyarakat.profil');

    Route::put('/profil', [
        ControllerProfilMasyarakat::class,
        'update'
    ])->name('masyarakat.profil.update');

    Route::put('/profil/password', [
        ControllerProfilMasyarakat::class,
        'password'
    ])->name('masyarakat.profil.password');


    /*
    |--------------------------------------------------------------------------
    | BERITA MASYARAKAT
    |--------------------------------------------------------------------------
    */

    Route::get('/masyarakat/berita', [
        ControllerBeritaMasyarakat::class,
        'index'
    ])->name('masyarakat.berita');

    Route::get('/masyarakat/berita/{slug}', [
        ControllerBeritaMasyarakat::class,
        'show'
    ])->name('masyarakat.berita.show');


    /*
    |--------------------------------------------------------------------------
    | PENGAJUAN PERMOHONAN
    |--------------------------------------------------------------------------
    */

    Route::get('/masyarakat/pengajuan', [
        ControllerPermohonan::class,
        'index'
    ])->name('masyarakat.pengajuan.index');

    Route::get('/masyarakat/pengajuan/create', [
        ControllerPermohonan::class,
        'create'
    ])->name('masyarakat.pengajuan.create');

    Route::post('/masyarakat/pengajuan', [
        ControllerPermohonan::class,
        'store'
    ])->name('masyarakat.pengajuan.store');

    Route::get('/masyarakat/pengajuan/{id}/edit', [
        ControllerPermohonan::class,
        'edit'
    ])->whereNumber('id')
      ->name('masyarakat.pengajuan.edit');

    Route::put('/masyarakat/pengajuan/{id}', [
        ControllerPermohonan::class,
        'update'
    ])->whereNumber('id')
      ->name('masyarakat.pengajuan.update');

    Route::delete('/masyarakat/pengajuan/{id}', [
        ControllerPermohonan::class,
        'destroy'
    ])->whereNumber('id')
      ->name('masyarakat.pengajuan.destroy');


    /*
    |--------------------------------------------------------------------------
    | RIWAYAT PERMOHONAN
    |--------------------------------------------------------------------------
    */

    Route::get('/masyarakat/riwayat', [
        ControllerPermohonan::class,
        'riwayat'
    ])->name('masyarakat.riwayat');

});


/*
|--------------------------------------------------------------------------
| KOMENTAR BERITA
|--------------------------------------------------------------------------
| Hanya pengguna yang sudah login dapat mengirim komentar.
|--------------------------------------------------------------------------
*/

Route::post('/berita/{slug}/komentar', [
    SaranController::class,
    'komentar'
])->middleware('auth')->name('berita.komentar.store');
