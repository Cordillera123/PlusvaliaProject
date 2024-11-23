<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_path',
        'type',
        'property_id',
    ];

    // Relación con la tabla Properties
    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
