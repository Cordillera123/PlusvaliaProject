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
        Schema::create('institutions', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nombre de la institución financiera
            $table->string('interest_rate'); // Tasa de interés (puede ser porcentaje)
            $table->integer('loan_term'); // Plazo del préstamo en años
            $table->string('contact_info')->nullable(); // Información de contacto (opcional)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institutions');
    }
};
