<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Simulation extends Model
{
    use HasFactory;

    protected $fillable = [
        'institution_id',
        'user_id',
        'income',
        'loan_amount',
        'loan_term',
        'interest_rate',
        'monthly_payment',
    ];

    // Relación con la tabla Institutions
    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }

    // Relación con la tabla Users (Clientes)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Método para calcular el pago mensual
    public function calculateMonthlyPayment()
    {
        // Fórmula básica para calcular el pago mensual (préstamo amortizado)
        $rate = $this->interest_rate / 100 / 12; // Tasa mensual
        $n = $this->loan_term * 12; // Número de meses
        $monthlyPayment = $this->loan_amount * $rate / (1 - pow(1 + $rate, -$n));

        return round($monthlyPayment, 2);
    }
}

