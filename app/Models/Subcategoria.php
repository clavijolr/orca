<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model
{
    use HasFactory;

    protected $fillable = [
                'subcategoria',
                'categoria_id',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);

    }
    public function grupo()
    {
        return $this->hasManyThrough(Categoria::class, Grupo::class);
    }
    public function movimentacoes()
    {
        return $this->hasMany(Movimentacao::class);
    }


}
