<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registrop extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'fecha',
        'cantidadt',
        'cantidadd'
    ];
    protected $table = 'registrosp';
}
