<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['codigo',
        'name',
        'email',
        'telefono',
        'pais',
        'ciudad',
        'numero_impuesto',
        'direccion'];
    use HasFactory;
}
