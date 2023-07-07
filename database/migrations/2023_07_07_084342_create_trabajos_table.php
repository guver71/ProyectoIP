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
        Schema::create('trabajos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_publication');
            $table->string('categoria');
            $table->string('description');
            $table->decimal('salario', 8, 2);
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->string('requiere_experiencia');
            $table->string('modalidad_tiempo');
            $table->string('beneficios');
            $table->string('datos_contacto');
            $table->string('titulo');
            $table->string('antecedentes');
            $table->string('estado');
            $table->unsignedBigInteger('empresa_id');
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trabajos');
    }
};
