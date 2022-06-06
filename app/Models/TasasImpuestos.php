<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TasasImpuestos extends Model
{
    use HasFactory;
    protected $table = "tasasimpuestos";
    protected $fillable = [
        'desinfeccion',
        'canon',
        'inspeccion',
        'patentemunicipal',
        'patentecomercial'
    ];
}
