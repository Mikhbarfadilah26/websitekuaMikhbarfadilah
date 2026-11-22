<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('komentar_berita', function (Blueprint $table) {
            $table->id();
            $table->foreignId('berita_id')->constrained('berita')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->text('isi_komentar');
            $table->text('tanggapan')->nullable(); // Jika nanti admin ingin membalas komentar
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('komentar_berita');
    }
};