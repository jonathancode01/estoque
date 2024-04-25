<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    protected $fillable = [
        'id_produto',
        'marca_id',
        'produto',
        'quant',
        'valor',
    ];

    public function marca()
    {
        return $this->belongsTo(Marcas::class, 'marca_id', 'id');
    }

use HasFactory;
}
