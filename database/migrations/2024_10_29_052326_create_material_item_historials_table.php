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
        Schema::create('material_item_historials', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('estado')->default('BUENO');
            $table->text('diagnostico')->nullable();
            $table->text('recomendacion')->nullable();
            $table->dateTime('fecha_registro');
            $table->unsignedBigInteger('material_item_id');
            $table->foreign('material_item_id')->references('id')->on('material_items')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('material_item_historials');
    }
};
