<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ServiceValidationTest extends TestCase
{
    use RefreshDatabase;

    protected $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = User::factory()->create([
            'role' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password123')
        ]);
    }

    /** @test */
    public function cannot_create_service_with_missing_fields()
    {
        $this->actingAs($this->admin);

        $response = $this->post('/services', [
            'name' => '', // Missing name
            'details' => 'Test Details',
            'price' => 1000
        ]);

        $response->assertSessionHasErrors('name');
        $this->assertDatabaseMissing('services', ['details' => 'Test Details']);
    }

    /** @test */
    public function cannot_create_service_with_negative_price()
    {
        $this->actingAs($this->admin);

        $response = $this->post('/services', [
            'name' => 'Test Service',
            'details' => 'Test Details',
            'price' => -1000
        ]);

        $response->assertSessionHasErrors('price');
        $this->assertDatabaseMissing('services', ['name' => 'Test Service']);
    }

    /** @test */
    public function cannot_create_service_with_very_long_name()
    {
        $this->actingAs($this->admin);

        $response = $this->post('/services', [
            'name' => str_repeat('a', 256), // Exceeds max length
            'details' => 'Test Details',
            'price' => 1000
        ]);

        $response->assertSessionHasErrors('name');
        $this->assertDatabaseMissing('services', ['details' => 'Test Details']);
    }
} 