<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    
    protected $table = 'person';

   
    protected $fillable = [
        'nombres',
        'apellidos',
        'fecha_nacimient',
        'ninos',
        'madre_cabeza',
        'estudio',
        'generos',
    ];

    protected $casts = [
        'fecha_nacimient' => 'date',
        'generos' => 'array', 
    ];
}