<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $fillable = [
                'grupo_id',
                'categoria',

    ];

    public function grupo()
    {
        return $this->belongsTo(Grupo::class);
    }

}
