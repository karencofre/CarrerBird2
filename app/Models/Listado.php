<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Empleo;
use App\Models\User;

class Listado extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'puntuacion',
    ];

    public function empleo()
    {
        return $this->belongsTo(Empleo::class);
    }
    public function trabajador(){
        return $this->belongsTo(User::class);
    }
}
