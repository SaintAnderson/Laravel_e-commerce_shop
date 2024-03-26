<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactsPageTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_get_about_page(): void
    {
        $response = $this->get('/contacts');

        $response->assertStatus(200);
    }
}
