<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Clientes extends Authenticatable
{
    use HasFactory, Notifiable;
    use HasRoles;

    // Campos da tabela
    protected $fillable = [
        'id',
        'nome',
        'endereco',
        'email',
        'nascimento'
    ];

    public function vendas() {
        return $this->hasMany(Vendas::class, 'cliente_id');
    }
}
