<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StockTest extends TestCase
{
    use RefreshDatabase;

    private function login()
    {
        $this->post('/login', [
            'email' => 'usuario@usuario.com',
            'password' => 'password'
        ]);
    }

    private function createProduct()
    {
        $this->post('/products', [
            'sku' => 'SPABC',
            'description' => 'SmartPhone ABC'
        ]);
    }

    private function generateToken()
    {
        $response = $this->post('/api/login', [
            'email' => 'usuario@usuario.com',
            'password' => 'password'
        ]);

        return $response->json('token');
    }

    public function testAddSotck()
    {
        $this->seed();
        $this->login();
        $this->createProduct();

        $response = $this->patch('/api/adicionar-produtos', [
            'sku' => 'SPABC',
            'amount' => 10
        ], ['Authorization' => "Bearer {$this->generateToken()}"]);

        $response->assertOk();
    }
}
