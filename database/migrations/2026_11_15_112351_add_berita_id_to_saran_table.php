<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('saran', function (Blueprint $table) {
            $table->foreignId('berita_id')
                ->nullable()
                ->after('user_id')
                ->constrained('beritas')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('saran', function (Blueprint $table) {
            $table->dropConstrainedForeignId('berita_id');
        });
    }
};