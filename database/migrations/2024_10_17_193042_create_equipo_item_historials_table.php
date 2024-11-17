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
        Schema::create('equipo_item_historials', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('estado')->default('BUENO');
            $table->text('diagnostico')->nullable();
            $table->text('recomendacion')->nullable();
            $table->unsignedBigInteger('equipo_item_id');
            $table->foreign('equipo_item_id')->references('id')->on('equipo_items')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipo_item_historials');
    }
};
