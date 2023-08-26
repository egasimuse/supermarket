<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class deleteProductTest extends TestCase
{
    /**
     * Test delete product.
     */
    public function test_delete_product_successfully(): void
    {
        $product = Product::factory()->create();
        $response = $this->post('/delete', [
            'product_id' => $product->id,
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/edit-products');

        $this->assertDatabaseMissing('products', [
           'id' => $product->id,
        ]);
    }
}
