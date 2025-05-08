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
        Schema::create('simulacions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('especie_id')->constrained('especies');
            $table->enum('tipo_crianza', ['intensiva', 'extensiva']);
            $table->integer('poblacion_inicial');

            // Cálculos productivos y económicos
            $table->decimal('produccion_total_kg', 8, 2)->nullable();
            $table->decimal('precio_venta_kg', 6, 2)->nullable();
            $table->decimal('ingresos', 10, 2)->nullable();
            $table->decimal('costo_operativo_efectivo', 10, 2)->nullable();
            $table->decimal('beneficio_bruto', 10, 2)->nullable();
            $table->decimal('depreciacion', 10, 2)->nullable();
            $table->decimal('amortizacion', 10, 2)->nullable();
            $table->decimal('costo_operativo_total', 10, 2)->nullable();
            $table->decimal('resultado_operativo_total', 10, 2)->nullable();
            $table->decimal('impuestos', 10, 2)->nullable();
            $table->decimal('costo_total', 10, 2)->nullable();
            $table->decimal('utilidad', 10, 2)->nullable();
            $table->decimal('rentabilidad', 5, 2)->nullable();

            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('simulacions');
    }
};
