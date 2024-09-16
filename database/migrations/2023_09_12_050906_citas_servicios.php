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
        Schema::create('citasServicios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cita_id'); // Campo para la llave foránea
            $table->foreign('cita_id')
                ->references('id')
                ->on('citas')
                ->onDelete('cascade'); // Opcional: esto configura la eliminación en cascada
            $table->unsignedBigInteger('servicio_id'); // Campo para la llave foránea
            $table->foreign('servicio_id')
                ->references('id')
                ->on('servicios')
                ->onDelete('cascade'); // Opcional: esto configura la eliminación en cascada
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citasServicios');
    }
};
