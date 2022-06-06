<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insumos extends Model
{
    use HasFactory;
    protected $table = "insumos";
    protected $fillable = [
        'dolar',
        'combustible',
        'neumaticos',
        'cubiertas',
        'camaras',
        'protectores',
        'vidautil',
        'recapado',
        'norecap',
        'chasis',
        'carroceria',
        'salariochofer',
        'salariofiscal',
        'salariojefe',
        'segurop',
        'segurov'
    ];
}
