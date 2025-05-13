<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ServiceApiTest extends TestCase
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
    public function api_returns_services_list()
    {
        // Create 3 services
        for ($i = 1; $i <= 3; $i++) {
            Service::create([
                'name' => "Service {$i}",
                'details' => "Details for service {$i}",
                'price' => 1000 * $i
            ]);
        }

        $response = $this->actingAs($this->admin)->get('/services');
        $response->assertStatus(200);
        $response->assertViewHas('services');
        $this->assertCount(3, $response->viewData('services'));
    }

    /** @test */
    public function api_requires_authentication()
    {
        $response = $this->get('/services');
        $response->assertRedirect('/login');
    }
} 