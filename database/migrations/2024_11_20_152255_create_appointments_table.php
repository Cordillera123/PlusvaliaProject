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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relación con el cliente (usuario)
            $table->foreignId('property_id')->constrained()->onDelete('cascade'); // Relación con la propiedad que se visitará
            $table->dateTime('appointment_date'); // Fecha y hora de la cita
            $table->enum('status', ['pending', 'confirmed', 'completed', 'canceled'])->default('pending'); // Estado de la cita
            $table->text('comments')->nullable(); // Comentarios adicionales de la cita
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
