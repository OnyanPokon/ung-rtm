<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rtm_lampiran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rtm_id');
            $table->unsignedBigInteger('fakultas_id')->nullable(); // null for university level
            $table->string('judul');
            $table->string('file_path');
            $table->string('file_name');
            $table->string('file_type');
            $table->integer('file_size');
            $table->timestamps();
            
            // Foreign key for RTM
            $table->foreign('rtm_id')->references('id')->on('rtms')->onDelete('cascade');
            
            // Foreign key for fakultas (only applies to non-null values)
            $table->foreign('fakultas_id')
                ->references('id')
                ->on('fakultas')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rtm_lampiran');
    }
}; 