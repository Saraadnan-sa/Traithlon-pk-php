<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\ContactController;

class ContactControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_contact_success()
    {
        // Fake valid contact data
        $contactData = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '1234567890',
            'message' => 'This is a test message.',
        ];

        // Create the request instance
        $request = Request::create('/contact', 'POST', $contactData);
        
        // Instantiate the controller
        $controller = new ContactController();
        
        // Call the store method and check if the data was inserted
        $response = $controller->store($request);

        // Check if the database contains the inserted contact
        $this->assertDatabaseHas('contacts', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ]);

        // Check if the success message is present
        $response->assertSessionHas('success', 'Your contact information has been submitted successfully!');
    }
}
