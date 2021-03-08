<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_products()
    {
        $response = $this->get('/products');

        $response->assertStatus(200);
    }
}
