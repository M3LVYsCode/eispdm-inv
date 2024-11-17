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
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('titulo_proyecto',255);
            $table->string('autor',255);
            $table->text('descripcion');
            $table->integer('gestion');
            $table->unsignedBigInteger('id_tutor');
            $table->foreign('id_tutor')->references('id')->on('docentes')->onDelete('cascade');
            $table->boolean('estado')->default(1);
            $table->string('portada_imagen', 255);
            $table->string('ruta_proyecto', 255);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyectos'); 
    }
};
