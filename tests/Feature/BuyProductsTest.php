<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BuyProductsTest extends TestCase
{
    /**
     * Test that check order the products.
     */
    public function test_buy_product_successfully(): void
    {
        $product = Product::factory()->create();
        $response = $this->post('/checkout', [
            'products' => $product->name,
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/products');

        $this->assertDatabaseHas('orders', [
           'id' => $product->id,
        ]);
    }
}
