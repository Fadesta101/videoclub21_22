<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    use HasFactory;

    protected $table = 'directores';

    protected $fillable = [
        'apellidos',
        'nombre'
    ];

    public function movies()
    {
        return $this->hasMany(Movie::class, 'director');
    }
}
