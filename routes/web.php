
<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| CONTROLLER LANDING
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\Landing\ControllerLanding;
use App\Http\Controllers\ControllerLayanan;
use App\Http\Controllers\Admin\ControllerSaran;
/*
|--------------------------------------------------------------------------
| CONTROLLER AUTH
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\Auth\ControllerAuthUser;

/*
|--------------------------------------------------------------------------
| CONTROLLER DASHBOARD
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\Dashboard\ControllerDashboardAdmin;
use App\Http\Controllers\Dashboard\ControllerDashboardmasyarakat;


/*
|--------------------------------------------------------------------------
| CONTROLLER REGISTRASI
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\Auth\ControllerRegisterUser;


/*
|--------------------------------------------------------------------------
| LANDING / BERANDA
|--------------------------------------------------------------------------
*/

Route::get('/', [ControllerLanding::class, 'index'])
    ->name('landing');

Route::get('/beranda', [ControllerLanding::class, 'index'])
    ->name('landing.beranda');


/*
|--------------------------------------------------------------------------
| LAYANAN
|--------------------------------------------------------------------------
*/

Route::get('/layanan', [ControllerLanding::class, 'layanan'])
    ->name('landing.layanan');

Route::get('/layanan/{id}', [ControllerLayanan::class, 'show'])
    ->name('layanan.show');


/*
|--------------------------------------------------------------------------
| PROFIL
|--------------------------------------------------------------------------
*/

Route::get('/tentang', [ControllerLanding::class, 'tentang'])
    ->name('landing.tentang');

Route::get('/visi-misi', [ControllerLanding::class, 'visimisi'])
    ->name('landing.visimisi');

Route::view('/sejarah', 'landing.sejarah')
    ->name('landing.sejarah');

Route::view('/struktur-organisasi', 'landing.struktur-organisasi')
    ->name('landing.struktur-organisasi');


/*
|--------------------------------------------------------------------------
| BERITA
|--------------------------------------------------------------------------
*/

Route::get('/berita', [ControllerLanding::class, 'berita'])
    ->name('landing.berita');

Route::get('/berita/{slug}', [ControllerLanding::class, 'detailBerita'])
    ->name('berita.detail');


/*
|--------------------------------------------------------------------------
| KONTAK
|--------------------------------------------------------------------------
*/

Route::get('/kontak', [ControllerLanding::class, 'kontak'])
    ->name('landing.kontak');


/*
|--------------------------------------------------------------------------
| PENCARIAN
|--------------------------------------------------------------------------
*/

Route::get('/pencarian', [ControllerLanding::class, 'pencarian'])
    ->name('landing.pencarian');


/*
|--------------------------------------------------------------------------
| AUTHENTICATION
|--------------------------------------------------------------------------
*/

// Halaman login
Route::get('/login', [ControllerAuthUser::class, 'index'])
    ->name('login');

// Proses login
Route::post('/login', [ControllerAuthUser::class, 'login'])
    ->name('login.proses');

// Logout
Route::post('/logout', [ControllerAuthUser::class, 'logout'])
    ->name('logout');


/*
|--------------------------------------------------------------------------
| DASHBOARD ADMIN
|--------------------------------------------------------------------------
|
| Setelah login dengan role "admin", ControllerAuthUser akan
| mengarahkan ke route: admin.dashboard
|
*/

/*
|--------------------------------------------------------------------------
| DASHBOARD ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/admin/dashboard', [ControllerDashboardAdmin::class, 'index'])
        ->name('admin.dashboard');


    /*
    |--------------------------------------------------------------------------
    | SARAN ADMIN
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
|
| Setelah login dengan role "masyarakat", ControllerAuthUser akan
| mengarahkan ke route: masyarakat.dashboard
|
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/masyarakat/dashboard', [ControllerDashboardmasyarakat::class, 'index'])
        ->name('masyarakat.dashboard');


    /*
|--------------------------------------------------------------------------
| REGISTRASI MASYARKAT
|--------------------------------------------------------------------------
*/

    Route::get('/register', [ControllerRegisterUser::class, 'index'])
        ->name('register');

    Route::post('/register', [ControllerRegisterUser::class, 'register'])
        ->name('register.proses');
});
