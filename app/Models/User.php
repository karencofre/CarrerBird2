<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Models\Formacion;
use App\Models\Trabajo;
use App\Models\Habilidad;
use App\Models\Empleo;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'street',
        'country',
        'city',
        'phone',
        'role',
        'organization',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function setPasswordAttribute($password) {

        $this->attributes['password'] = bcrypt($password);
    }

    public function formaciones(){
        return $this->hasMany(Formacion::class);
    }

    public function trabajos(){
        return $this->hasMany(Trabajo::class);
    }

    public function habilidads(){
        return $this->hasMany(Habilidad::class);
    }
    public function empleos(){
        return $this->hasMany(Empleo::class);
    }
}
