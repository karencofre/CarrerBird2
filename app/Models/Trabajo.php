<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajo extends Model
{
  use HasFactory;

    protected $fillable = [
        'id',
        'nombre_trabajo',
        'fecha_trabajo',
        'cargo_trabajo',
    ];
    public function trabajador()
    {
        return $this->belongsTo(User::class); 
    }
}
