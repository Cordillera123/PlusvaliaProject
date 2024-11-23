<?php
// app/Models/User.php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Los atributos que se pueden asignar en masa.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'profile_picture',
    ];

    /**
     * Los atributos que deben ocultarse para los arrays.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Los atributos que deben convertirse a tipos nativos.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relación con el modelo Role (muchos a muchos a través de la tabla intermedia 'user_roles').
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles');
    }
}
