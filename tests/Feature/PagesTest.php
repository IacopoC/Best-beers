<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PagesTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testHomePage()
    {
        $response = $this->get('/');
        $response->assertSee('Home');
        $response->assertStatus(200);
    }

    public function testBeerPage()
    {
        $response = $this->get('/beers/1');
        $response->assertSee('Beers');
        $response->assertStatus(200);
    }

    public function testSingleBeerPage()
    {
        $response = $this->get('/single-beer/1');

        $response->assertStatus(200);
    }

    public function testLoginPage()
    {
        $response = $this->get('/login');
        $response->assertSee('Login');
        $response->assertStatus(200);
    }

    public function testRegisterPage()
    {
        $response = $this->get('/register');
        $response->assertSee('Register');
        $response->assertStatus(200);
    }
}
