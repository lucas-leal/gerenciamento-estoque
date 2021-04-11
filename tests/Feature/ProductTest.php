<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    private function login()
    {
        $this->post('/login', [
            'email' => 'usuario@usuario.com',
            'password' => 'password'
        ]);
    }

    public function testCreate()
    {
        $this->seed();
        $this->login();

        $this->post('/products', [
            'sku' => 'SPABC',
            'description' => 'SmartPhone ABC'
        ]);

        $response = $this->get('/products');

        $response->assertSee('SPABC');
        $response->assertSee('SmartPhone ABC');
    }
}
