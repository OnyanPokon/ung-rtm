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
        Schema::create('rtm_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rtm_id');
            $table->unsignedBigInteger('fakultas_id')->nullable(); // null for university level
            $table->string('mengetahui1_nama');
            $table->string('mengetahui1_jabatan');
            $table->string('mengetahui1_nip');
            $table->string('mengetahui2_nama');
            $table->string('mengetahui2_jabatan');
            $table->string('mengetahui2_nip');
            $table->string('pemimpin_rapat');
            $table->string('notulis');
            $table->date('tanggal_pelaksanaan');
            $table->time('waktu_pelaksanaan');
            $table->string('tempat_pelaksanaan');
            $table->text('agenda');
            $table->text('peserta');
            $table->string('tahun_akademik');
            $table->timestamps();

            // Foreign key relationships
            $table->foreign('rtm_id')->references('id')->on('rtms')->onDelete('cascade');
            $table->foreign('fakultas_id')->references('id')->on('fakultas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rtm_reports');
    }
};
