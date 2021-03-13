<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    // Campos da tabela
    protected $fillable = [
        'id',
        'nome',
        'endereco',
        'email',
        'telefone'
    ];

    // Nome da tabela
    protected $table = 'Funcionario';

    public function vendas() {
        return $this->hasMany( Vendas::class, 'funcionario_id' );
    } 

    /* Apenas teste */
    /* public function vendas() {
        return $this->hasManyThrough(
            Clientes::class,
            Vendas::class,
            'id', 
            'id' 
        );
    } */
}
