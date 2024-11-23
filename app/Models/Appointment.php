<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'property_id',
        'appointment_date',
        'status',
        'comments',
    ];

    // Relación con la tabla Users (Clientes)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con la tabla Properties
    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
