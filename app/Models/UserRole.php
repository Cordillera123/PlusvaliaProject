<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;

    // La tabla que corresponde a este modelo
    protected $table = 'user_roles';

    // Definir los atributos que se pueden asignar en masa (en caso de que los necesites)
    protected $fillable = [
        'user_id',
        'role_id',
    ];

    // Desactivar las marcas de tiempo si no las usas (opcional)
    public $timestamps = false;
}
