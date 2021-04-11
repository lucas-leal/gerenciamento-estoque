<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiLoginTest extends TestCase
{
    use RefreshDatabase;

    public function testLogin()
    {
        $this->seed();

        $response = $this->post('/api/login', [
            'email' => 'usuario@usuario.com',
            'password' => 'password'
        ]);

        $response->assertOk();
        $response->assertJsonStructure(['token']);
    }

    public function testWrongCredentials()
    {
        $this->seed();

        $response = $this->post('/api/login', [
            'email' => 'another@usuario.com',
            'password' => 'password'
        ]);

        $response->assertUnauthorized();
        $response->assertJson(['message' => 'Credenciais inválidas']);
    }
}
