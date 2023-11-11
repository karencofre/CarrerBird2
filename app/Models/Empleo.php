<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleo extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'cargo',
        'descripcion',
        'renta',
        'requisito',
    ];
}
