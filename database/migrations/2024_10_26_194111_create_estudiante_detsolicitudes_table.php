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
        Schema::create('estudiante_detsolicitudes', function (Blueprint $table) {
            $table->id(); // ID auto-incremental como clave primaria
            // Llave foránea a 'solicitudes'
            // Borrado en cascada
            $table->unsignedBigInteger('id_solicitud');
            $table->foreign('id_solicitud')->references('id')->on('estudiante_solicitudes')->onDelete('cascade');
            // Llave foránea a 'equipos'
            // Restricción al eliminar equipos prestados
            $table->unsignedBigInteger('equipo_item_id');
            $table->foreign('equipo_item_id')->references('id')->on('equipo_items')->onDelete('cascade');
            $table->timestamp('fecha_prestamo')->useCurrent(); // Fecha actual como predeterminada
            $table->timestamp('fecha_devolucion')->nullable(); // Puede ser nulo
  
            $table->timestamps(); // Agrega 'created_at' y 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      Schema::dropIfExists('estudiante_detsolicitudes');
    }
};
