<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Tabel Users
        |--------------------------------------------------------------------------
        */
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->string('nama');
            $table->string('email')->unique();
            $table->string('password');

            // admin / masyarakat
            $table->string('role')->default('masyarakat');

            $table->string('no_hp')->nullable();
            $table->text('alamat')->nullable();

            $table->rememberToken();
            $table->timestamps();
        });
        /*
|--------------------------------------------------------------------------
| Tabel Layanan
|--------------------------------------------------------------------------
*/
        Schema::create('layanan', function (Blueprint $table) {
            $table->id();

            // Judul utama layanan
            $table->string('judul');

            // Isi / penjelasan lengkap layanan
            $table->text('isi');

            $table->timestamps();
        });

        /*
        |--------------------------------------------------------------------------
        | Tabel Permohonan
        |--------------------------------------------------------------------------
        */
        Schema::create('permohonan', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->foreignId('layanan_id')
                ->constrained('layanan')
                ->cascadeOnDelete();

            $table->string('nomor_permohonan')->unique();

            $table->date('tanggal_pengajuan');

            // diajukan / diproses / selesai / ditolak
            $table->string('status')->default('diajukan');

            $table->text('keterangan')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('permohonan');
        Schema::dropIfExists('layanan');
        Schema::dropIfExists('users');
    }
};
