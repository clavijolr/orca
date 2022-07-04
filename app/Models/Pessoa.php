<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;
    protected $fillable = [
                        'nome',
                        'razao',
                        'cpfcnpj',
    ];
    public function movimentacoes()
    {
        return $this->hasMany(Movimentacao::class);
    }


}
