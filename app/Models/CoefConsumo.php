<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoefConsumo extends Model
{
    use HasFactory;
    protected $table = "coeficienteconsumo";
    protected $fillable = [
        "combustible",
        "lubricante",
        "neumaticos",
        "repuestos",
        "depreciacionvehiculo"
    ];
}
