<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    /**
     * Los atributos que se pueden asignar en masa.
     */
    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * Relación con el modelo User.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_roles');
    }
}
