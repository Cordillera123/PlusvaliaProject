<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('roles', function (Blueprint $table) {
        $table->id(); // ID principal
        $table->string('name', 50)->unique(); // Nombre del rol
        $table->text('description')->nullable(); // Descripción opcional
        $table->timestamps(); // Campos de created_at y updated_at
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
