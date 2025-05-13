<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContactControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_contact_success()
    {
        // Valid contact data
        $contactData = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '1234567890',
            'message' => 'This is a test message.',
        ];

        // Make HTTP POST request to the contact route
        $response = $this->post('/contact', $contactData);

        // Assert contact was saved
        $this->assertDatabaseHas('contacts', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ]);

        // Assert redirect and session flash message
        $response->assertRedirect('/');
        $response->assertSessionHas('success', 'Your contact information has been submitted successfully!');
    }
}
