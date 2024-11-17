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
        Schema::create('docente_solicitudes', function (Blueprint $table) {
            $table->id(); // Auto-incremental ID
            $table->unsignedBigInteger('docente_id');
            $table->foreign('docente_id')->references('id')->on('docentes')->onDelete('cascade');
            $table->timestamp('fecha_solicitud')->useCurrent(); // Timestamp por defecto
            $table->date('fecha_devolucion')->nullable(); // Permitir nulo
            $table->enum('estado', ['pendiente', 'aprobada', 'rechazada', 'devuelto'])
                      ->default('pendiente'); // Valor por defecto
            $table->timestamps(); // Agrega columnas created_at y updated_at automáticamente
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('docente_solicitudes');
    }
};
