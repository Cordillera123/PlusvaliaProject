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
        Schema::create('simulations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('institution_id')->constrained()->onDelete('cascade'); // Relación con la tabla institutions
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relación con el usuario (cliente)
            $table->decimal('income', 10, 2); // Ingreso del cliente (en formato monetario)
            $table->decimal('loan_amount', 10, 2); // Monto del crédito solicitado
            $table->integer('loan_term'); // Plazo del crédito en años
            $table->decimal('interest_rate', 5, 2); // Tasa de interés aplicada
            $table->decimal('monthly_payment', 10, 2)->nullable(); // Pago mensual calculado (puede ser calculado posteriormente)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('simulations');
    }
};
