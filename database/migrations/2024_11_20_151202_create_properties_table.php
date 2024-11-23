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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Título de la propiedad
            $table->text('description')->nullable(); // Descripción de la propiedad
            $table->string('type'); // Tipo de propiedad (casa, apartamento, terreno, etc.)
            $table->decimal('price', 10, 2); // Precio de la propiedad
            $table->string('location'); // Ubicación de la propiedad
            $table->string('status')->default('available'); // Estado: available, sold, rented
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relación con la tabla Users (Agente/Propietario)
            $table->timestamps(); // Timestamps automáticos
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
