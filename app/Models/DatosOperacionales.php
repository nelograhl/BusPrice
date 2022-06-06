<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatosOperacionales extends Model
{
    use HasFactory;
    protected $table = "datosoperacionales";
    protected $fillable = [
        'totalhabitantes',        
        'totalpasajeros',
        'totalflota',
        'kilometrajediario',
        'rpd',
        'rpm',
        'ipk'
    ];
}
