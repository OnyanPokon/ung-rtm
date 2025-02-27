<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('r_t_m_s', function (Blueprint $table) { // Perbaiki nama tabel ke 'rtms'
            $table->id();
            $table->string('name');
            $table->string('tahun');
            $table->json('ami_anchor')->nullable(); // Simpan sebagai JSON
            $table->json('survei_anchor')->nullable(); // Simpan sebagai JSON
            $table->json('akreditas_anchor')->nullable(); // Simpan sebagai JSON
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rtms');
    }
};
