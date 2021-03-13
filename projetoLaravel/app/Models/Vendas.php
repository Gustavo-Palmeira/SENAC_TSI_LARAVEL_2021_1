<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendas extends Model
{
    use HasFactory;

    // Campos da tabela
    protected $fillable = [
        'id',
        'cliente_id',
        'funcionario_id',
        'data_da_venda',
        'valor'
    ];

    // Nome da tabela
    protected $table = 'Vendas';

    public function cliente() {
        return $this->belongsTo(Clientes::class, 'id');
    }
}
