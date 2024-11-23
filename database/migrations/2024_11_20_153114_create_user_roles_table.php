<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_roles', function (Blueprint $table) {
            $table->id(); // ID único para la tabla pivot
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Clave foránea para el usuario
            $table->foreignId('role_id')->constrained()->onDelete('cascade'); // Clave foránea para el rol
            $table->timestamps(); // Tiempos de creación y actualización
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_roles');
    }
};
