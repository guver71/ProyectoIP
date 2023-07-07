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
        Schema::create('postulacions', function (Blueprint $table) {
            $table->id();
            $table->string('ruta_cv');
            $table->string('puntaje');
            $table->string('estado');
            $table->unsignedBigInteger('egresado_id');
            $table->unsignedBigInteger('trabajo_id');
            $table->foreign('egresado_id')->references('id')->on('egresados')->onDelete('cascade');
            $table->foreign('trabajo_id')->references('id')->on('trabajos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postulacions');
    }
};
