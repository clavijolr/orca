<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obra extends Model
{
    use HasFactory;
    protected $fillable = [
                'descricao',
                'data_inicio',
                'data_fim',
                'saldo_final',
    ];

    public function movimentacoes()
    {
        return $this->hasMany(Movimentacao::class);
    }


}
