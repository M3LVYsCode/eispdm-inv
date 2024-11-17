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
        Schema::create('materiales', function (Blueprint $table) {
            
                $table->id();
                $table->timestamps();
                $table->string('nombre');
                $table->text('descripcion');
                $table->integer('cantidad_disponible')->default(0);
                $table->string('unidad');
                $table->text('observaciones')->nullable();
                $table->boolean('estado')->default(1);
                $table->string('ruta_imagen', 255)->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materiales');
    }
};
