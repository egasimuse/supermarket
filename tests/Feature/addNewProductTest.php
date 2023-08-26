<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class addNewProductTest extends TestCase
{
    /**
     * Add new product test.
     */
    public function test_add_new_product_successfully(): void
    {
        $response = $this->post('/add', [
            'name' => 'A',
            'unit_price' => '50',
            'special_unit' => '3',
            'special_price' => '130',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/edit-products');

        $this->assertDatabaseHas('products', [
            'name' => 'A',
        ]);
    }
}
