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
        Schema::create('rtm_rencana_tindak_lanjut', function (Blueprint $table) {
            $table->id();
            $table->text('rencana_tindak_lanjut');
            $table->string('target_penyelesaian');
            $table->unsignedBigInteger('indicator_id')->comment('ID of indicator from AMI');
            $table->unsignedBigInteger('rtm_id');
            $table->unsignedBigInteger('fakultas_id')->nullable()->comment('Null for university level');
            $table->timestamps();
            
            // Foreign key constraints
            $table->foreign('rtm_id')->references('id')->on('rtms')->onDelete('cascade');
            // Add foreign key for fakultas_id if needed
            // $table->foreign('fakultas_id')->references('id')->on('fakultas')->onDelete('cascade');
            
            // We need a unique constraint to avoid duplicates
            $table->unique(['indicator_id', 'rtm_id', 'fakultas_id'], 'unique_rtm_indicator_fakultas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rtm_rencana_tindak_lanjut');
    }
}; 