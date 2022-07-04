<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;
    protected $fillable = [
                'empresa',
                'cpfcnpj',
                'empreiteira',
                'tipo_pessoa',
    ];
    public function movimentacoes()
    {
        return $this->hasMany(Movimentacao::class);
    }

}
