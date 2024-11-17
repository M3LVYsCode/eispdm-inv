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
        Schema::create('categoria_equipos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('categoria_id');
            $table->unsignedBigInteger('equipo_id');
            //$table->foreignId('categoria_id')->constrained()->onDelete('cascade');
            //$table->foreignId('equipo_id')->constrained()->onDelete('cascade');
            //claves foráneas

            //$table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
            //$table->foreign('equipo_id')->references('id')->on('equipos')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categoria_equipos');
    }
};
