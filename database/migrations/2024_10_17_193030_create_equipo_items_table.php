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
        Schema::create('equipo_items', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('codigo')->unique();
            $table->unsignedBigInteger('equipo_id');
            $table->foreign('equipo_id')->references('id')->on('equipos')->onDelete('cascade');
            $table->unsignedBigInteger('laboratorio_id');
            $table->foreign('laboratorio_id')->references('id')->on('laboratorios')->onDelete('cascade');
            $table->enum('estado',['disponible','prestado','mantenimiento'])->default('disponible');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipo_items');
    }
};
