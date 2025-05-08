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
        Schema::create('costo_detalles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('simulacion_id')->constrained('simulacions')->onDelete('cascade');
            $table->foreignId('costo_categoria_id')->constrained('costo_categorias')->onDelete('cascade');
            $table->string('nombre_item', 100);
            $table->decimal('monto', 10, 2);  // Precisión para valores monetarios
            $table->string('unidad', 20)->nullable();  // Ej: kg, unidad, S/
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('costo_detalles');
    }
};
