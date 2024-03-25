<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CartPageTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_get_card_page_no_auth(): void
    {
        $response = $this->get('/cart');

        $response->assertStatus(200);
    }

    public function test_get_card_add_page_no_auth(): string
    {
        $product = Product::factory()->create();
        $response = $this->get('/cart/add/' . $product->slug);

        $response->assertStatus(302);

        return $product->slug;
    }

    public function test_get_card_remove_page_no_auth(): void
    {
        $productSlug = $this->test_get_card_add_page_no_auth();
        $response = $this->get('/cart/remove/' . $productSlug);

        $response->assertStatus(302);
    }

    public function test_get_card_page_auth(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/cart');

        $response->assertStatus(200);
    }

    public function test_get_card_add_page_auth(): array
    {
        $user = User::factory()->create();
        $product = Product::factory()->create();
        $response = $this->actingAs($user)->get('/cart/add/' . $product->slug);

        $response->assertStatus(302);

        return [
            'user' => $user,
            'productSlug' => $product->slug,
        ];
    }

    public function test_get_card_remove_page_auth(): void
    {
        $data = $this->test_get_card_add_page_auth();
        $response = $this->actingAs($data['user'])->get('/cart/remove/' . $data['productSlug']);

        $response->assertStatus(302);
    }
}
