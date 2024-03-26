<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductPageTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_get_products_page(): void
    {
        $product = Product::factory()->create();
        $response = $this->get('/products/' . $product->slug);

        $response->assertStatus(200);
    }

    public function test_post_product_page_store_review_no_auth(): void
    {
        $product = Product::factory()->create();
        $response = $this->post('/products/' . $product->slug);

        $response->assertStatus(302);
    }

    public function test_post_product_page_store_review_auth(): void
    {
        $user = User::factory()->create();
        $product = Product::factory()->create();
        $response = $this->actingAs($user, 'web')->post('/products/' . $product->slug, [
            'product_id' => $product->id,
            'comment' => 'tester',
            'rating' => rand(1, 5),
            'user_id' => $user->id,
        ]);

        $response->dumpSession()->assertSessionHasNoErrors();
    }
}
