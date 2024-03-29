<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Services\CompareService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ComparePageTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_get_compare_page(): void
    {
        $response = $this->get('/compare');

        $response->assertStatus(200);
    }

    public function test_post_compare_add_page(): int
    {
        $product = Product::factory()->create();
        $response = $this->post('/compare/add', [
            'id' => $product->id,
        ]);

        $response->assertStatus(200);

        return $product->id;
    }

    public function test_post_compare_remove_page(): void
    {
        $productId = $this->test_post_compare_add_page();
        $response = $this->post('/compare/remove', [
            'id' => $productId,
        ]);

        $response->assertStatus(200);
    }
}
