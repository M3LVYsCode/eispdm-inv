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
        Schema::create('material_items', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('codigo')->unique();
            $table->unsignedBigInteger('material_id');
            $table->foreign('material_id')->references('id')->on('materiales')->onDelete('cascade');
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
        Schema::dropIfExists('material_items');
    }
};
