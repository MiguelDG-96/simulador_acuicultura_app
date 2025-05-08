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
        Schema::create('especies', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->decimal('peso_final_kg', 5, 2);
            $table->decimal('precio_venta_kg', 6, 2);
            $table->decimal('ca', 4, 2);
            $table->decimal('costo_alimento', 6, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('especies');
    }
};
