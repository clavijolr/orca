<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimentacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'emissao',
        'vencimento',
        'baixa',
        'empresa_id',
        'conta_id',
        'grupo_id',
        'categoria_id',
        'subcategoria_id',
        'pessoa_id',
        'descricao',
        'tipo',
        'valor',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
    public function grupo()
    {
        return $this->belongsTo(Grupo::class);
    }
    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
    public function subcategoria()
    {
        return $this->belongsTo(Subcategoria::class);
    }
    public function conta()
    {
        return $this->belongsTo(Conta::class);
    }
    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class);
    }
    
}
