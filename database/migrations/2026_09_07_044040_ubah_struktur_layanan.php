<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('layanan', function (Blueprint $table) {

            // nama_layanan → judul
            $table->renameColumn('nama_layanan', 'judul');

            // deskripsi → isi
            $table->renameColumn('deskripsi', 'isi');

            // hapus persyaratan karena sekarang isi sudah mencakup semuanya
            $table->dropColumn('persyaratan');
        });
    }

    public function down(): void
    {
        Schema::table('layanan', function (Blueprint $table) {

            $table->renameColumn('judul', 'nama_layanan');

            $table->renameColumn('isi', 'deskripsi');

            $table->text('persyaratan')->nullable();
        });
    }
};