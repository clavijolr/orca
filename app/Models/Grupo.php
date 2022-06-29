<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;
        protected $fillable = [
                        'grupo',
                        'tipo',
    ];
    public function categorias()
    {
        return $this->hasMany(Categoria::class);

    }    
}
