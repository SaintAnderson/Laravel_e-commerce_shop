<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CatalogPageTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_get_catalog_page(): void
    {
        $response = $this->get('/catalog');

        $response->assertStatus(200);
    }
}
