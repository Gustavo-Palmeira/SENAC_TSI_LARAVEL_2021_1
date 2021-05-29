<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Clientes;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ClientesTest extends TestCase
{
    use DatabaseTransactions;

    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testeCreate() {
        $cliente = Clientes::create([
            'nome' => 'Bruna',
            'email' => 'bruna@senac.com',
            'endereco' => 'Av 7',
            'nascimento' => '1987-10-10',
        ]);

        $this->assertDatabaseHas('Clientes', ['nome' => 'Gabriel']);

        $this->assertDatabaseHas('Clientes', ['email' => 'bruna@senac.com']);

        $this->assertDatabaseHas('Clientes', ['endereco' => 'Av 7']);

        $this->assertDatabaseHas('Clientes', ['nascimento' => '1987-10-10']);
        
/*      $id = $cliente->id;

        $cliente->destroy($cliente->id);

        $this->assertDatabaseMissing('Clientes', ['id' => $id]); */
    }
}
