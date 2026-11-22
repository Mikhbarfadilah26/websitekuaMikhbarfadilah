<?php

use Illuminate\Support\Facades\Route;

// =====================================================
// CONTROLLER LANDING
// =====================================================
use App\Http\Controllers\Landing\ControllerLanding;
use App\Http\Controllers\Landing\ControllerLayanan;
use App\Http\Controllers\Landing\ControllerKomentarBerita as LandingKomentarBerita;

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
use App\Http\Controllers\Masyarakat\ControllerTanyaMasyarakat;

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
use App\Http\Controllers\Admin\ControllerPengajuan;
use App\Http\Controllers\Admin\ControllerKomentarBerita as AdminKomentarBerita;

/*
|--------------------------------------------------------------------------
| LANDING / BERANDA
|--------------------------------------------------------------------------
*/

Route::get('/', [ControllerLanding::class, 'index'])->name('landing');
Route::get('/beranda', [ControllerLanding::class, 'index'])->name('landing.beranda');

/*
|--------------------------------------------------------------------------
| LAYANAN LANDING
|--------------------------------------------------------------------------
*/
Route::get('/layanan', [ControllerLanding::class, 'layanan'])->name('landing.layanan');
Route::get('/layanan/{id}', [ControllerLayanan::class, 'show'])->name('layanan.show');

/*
|--------------------------------------------------------------------------
| PERSYARATAN LANDING
|--------------------------------------------------------------------------
*/
Route::get('/persyaratan', [ControllerLanding::class, 'persyaratan'])->name('landing.persyaratan');

/*
|--------------------------------------------------------------------------
| PROFIL LANDING
|--------------------------------------------------------------------------
*/
Route::get('/tentang', [ControllerLanding::class, 'tentang'])->name('landing.tentang');
Route::get('/visi-misi', [ControllerLanding::class, 'visimisi'])->name('landing.visimisi');
Route::view('/sejarah', 'landing.sejarah')->name('landing.sejarah');
Route::view('/struktur-organisasi', 'landing.struktur-organisasi')->name('landing.struktur-organisasi');

/*
|--------------------------------------------------------------------------
| BERITA LANDING & KOMENTAR BERITA (MANDIRI)
|--------------------------------------------------------------------------
*/
Route::get('/berita', [ControllerLanding::class, 'berita'])->name('landing.berita');
Route::get('/berita/{slug}', [ControllerLanding::class, 'detailBerita'])->name('berita.detail');
Route::post('/berita/{slug}/komentar', [LandingKomentarBerita::class, 'store'])
    ->middleware('auth')
    ->name('berita.komentar.store');

/*
|--------------------------------------------------------------------------
| KONTAK & PENCARIAN
|--------------------------------------------------------------------------
*/
Route::get('/kontak', [ControllerLanding::class, 'kontak'])->name('landing.kontak');
Route::get('/pencarian', [ControllerLanding::class, 'pencarian'])->name('landing.pencarian');

/*
|--------------------------------------------------------------------------
| AUTH (LOGIN, REGISTER, LOGOUT)
|--------------------------------------------------------------------------
*/
Route::get('/login', [ControllerAuthUser::class, 'index'])->name('login');
Route::post('/login', [ControllerAuthUser::class, 'login'])->name('login.proses');

Route::get('/register', [ControllerRegisterUser::class, 'index'])->name('register');
Route::post('/register', [ControllerRegisterUser::class, 'register'])->name('register.proses');

Route::post('/logout', [ControllerAuthUser::class, 'logout'])->middleware('auth')->name('logout');


/*
|--------------------------------------------------------------------------
| ROUTE ADMIN
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    Route::get('/admin/dashboard', [ControllerDashboardAdmin::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/akun', [ControllerAkun::class, 'index'])->name('admin.akun.index');
    Route::put('/admin/akun', [ControllerAkun::class, 'update'])->name('admin.akun.update');

    Route::get('/admin/laporan', [ControllerLaporan::class, 'index'])->name('admin.laporan.index');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('akun-admin', ControllerAdmin::class)
            ->parameters(['akun-admin' => 'id'])
            ->names([
                'index' => 'admin.index',
                'create' => 'admin.create',
                'store' => 'admin.store',
                'edit' => 'admin.edit',
                'update' => 'admin.update',
                'destroy' => 'admin.destroy',
            ])->except(['show']);

        Route::resource('berita', ControllerBerita::class)->except(['show']);
        Route::resource('layanan', AdminControllerLayanan::class)->except(['show']);
        Route::resource('persyaratan', ControllerPersyaratan::class)->except(['show']);

        // Route Kelola Komentar Berita oleh Admin (Sudah diperbaiki)
        Route::get('/komentar-berita', [AdminKomentarBerita::class, 'index'])->name('komentar.index');
        Route::put('/komentar-berita/{id}/balas', [AdminKomentarBerita::class, 'balas'])->name('komentar.balas');
        Route::delete('/komentar-berita/{id}', [AdminKomentarBerita::class, 'destroy'])->name('komentar.destroy');

        // Perbaikan: Path url disesuaikan tanpa dobel kata 'admin'
        Route::get('/pengajuan', [ControllerPengajuan::class, 'index'])->name('pengajuan.index');
        Route::patch('/pengajuan/{id}/status', [ControllerPengajuan::class, 'updateStatus'])->name('pengajuan.status');
        Route::delete('/pengajuan/{id}', [ControllerPengajuan::class, 'destroy'])->name('pengajuan.destroy');
    });

    // CRUD KELOLA MASYARAKAT
    Route::get('/admin/masyarakat', [ControllerMasyarakat::class, 'index'])->name('admin.masyarakat.index');
    Route::get('/admin/masyarakat/create', [ControllerMasyarakat::class, 'create'])->name('admin.masyarakat.create');
    Route::post('/admin/masyarakat', [ControllerMasyarakat::class, 'store'])->name('admin.masyarakat.store');
    Route::get('/admin/masyarakat/{masyarakat}/edit', [ControllerMasyarakat::class, 'edit'])->whereNumber('masyarakat')->name('admin.masyarakat.edit');
    Route::put('/admin/masyarakat/{masyarakat}', [ControllerMasyarakat::class, 'update'])->whereNumber('masyarakat')->name('admin.masyarakat.update');
    Route::delete('/admin/masyarakat/{masyarakat}', [ControllerMasyarakat::class, 'destroy'])->whereNumber('masyarakat')->name('admin.masyarakat.destroy');

    Route::patch('/admin/masyarakat/{masyarakat}/setujui', [ControllerMasyarakat::class, 'setujui'])->whereNumber('masyarakat')->name('admin.masyarakat.setujui');
    Route::patch('/admin/masyarakat/{masyarakat}/tolak', [ControllerMasyarakat::class, 'tolak'])->whereNumber('masyarakat')->name('admin.masyarakat.tolak');

    // ADMIN KELOLA PERTANYAAN MASYARAKAT (DARI TABEL SARAN)
    Route::get('/admin/saran', [ControllerSaran::class, 'index'])->name('admin.saran.index');
    Route::get('/admin/saran/{id}', [ControllerSaran::class, 'show'])->name('admin.saran.show');
    Route::post('/admin/saran/{id}/balas', [ControllerSaran::class, 'balas'])->name('admin.saran.balas');
    Route::delete('/admin/saran/{id}', [ControllerSaran::class, 'destroy'])->name('admin.saran.destroy');
});


/*
|--------------------------------------------------------------------------
| ROUTE MASYARAKAT
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    Route::get('/masyarakat/dashboard', [ControllerDashboardmasyarakat::class, 'index'])->name('masyarakat.dashboard');

    Route::get('/profil', [ControllerProfilMasyarakat::class, 'index'])->name('masyarakat.profil');
    Route::put('/profil', [ControllerProfilMasyarakat::class, 'update'])->name('masyarakat.profil.update');
    Route::put('/profil/password', [ControllerProfilMasyarakat::class, 'password'])->name('masyarakat.profil.password');

    Route::get('/masyarakat/berita', [ControllerBeritaMasyarakat::class, 'index'])->name('masyarakat.berita');
    Route::get('/masyarakat/berita/{slug}', [ControllerBeritaMasyarakat::class, 'show'])->name('masyarakat.berita.show');

    // PENGAJUAN PERMOHONAN
    Route::get('/masyarakat/pengajuan', [ControllerPermohonan::class, 'index'])->name('masyarakat.pengajuan.index');
    Route::get('/masyarakat/pengajuan/create', [ControllerPermohonan::class, 'create'])->name('masyarakat.pengajuan.create');
    Route::post('/masyarakat/pengajuan', [ControllerPermohonan::class, 'store'])->name('masyarakat.pengajuan.store');
    Route::get('/masyarakat/pengajuan/{id}/edit', [ControllerPermohonan::class, 'edit'])->whereNumber('id')->name('masyarakat.pengajuan.edit');
    Route::put('/masyarakat/pengajuan/{id}', [ControllerPermohonan::class, 'update'])->whereNumber('id')->name('masyarakat.pengajuan.update');
    Route::delete('/masyarakat/pengajuan/{id}', [ControllerPermohonan::class, 'destroy'])->whereNumber('id')->name('masyarakat.pengajuan.destroy');

    // RIWAYAT PERMOHONAN
    Route::get('/masyarakat/riwayat', [ControllerPermohonan::class, 'riwayat'])->name('masyarakat.riwayat');

    // TANYA ADMIN (MENGGUNAKAN TABEL SARAN)
    Route::get('/masyarakat/tanya', [ControllerTanyaMasyarakat::class, 'index'])->name('masyarakat.tanya.index');
    Route::post('/masyarakat/tanya', [ControllerTanyaMasyarakat::class, 'store'])->name('masyarakat.tanya.store');
});