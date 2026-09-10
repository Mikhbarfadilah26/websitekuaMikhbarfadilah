<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migration.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->enum('status', [
                'pending',
                'disetujui',
                'ditolak'
            ])
            ->default('pending')
            ->after('alamat');

        });
    }

    /**
     * Batalkan migration.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->dropColumn('status');

        });
    }
};