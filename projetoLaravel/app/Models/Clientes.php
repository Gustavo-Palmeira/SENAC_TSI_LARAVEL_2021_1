<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    use HasFactory;

    // Campos da tabela
    protected $fillable = [
        'id',
        'nome',
        'endereco',
        'email',
        'nascimento'
    ];

    // Nome da tabela
    protected $table = 'Clientes';

    public function vendas() {
        return $this->hasMany(Vendas::class, 'cliente_id');
    }
}
