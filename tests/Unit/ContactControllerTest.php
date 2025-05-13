<?php

namespace Tests\Unit;

use App\Http\Controllers\ContactController;
use App\Models\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function store_contact_success()
    {
        $data = [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'message' => 'Test message'
        ];

        $response = $this->post('/contact', $data);

        $response->assertStatus(302);
        $this->assertDatabaseHas('contacts', $data);
    }
}
