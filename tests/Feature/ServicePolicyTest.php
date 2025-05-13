<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ServicePolicyTest extends TestCase
{
    use RefreshDatabase;

    protected $admin;
    protected $regularUser;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = User::factory()->create([
            'role' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password123')
        ]);
        $this->regularUser = User::factory()->create([
            'role' => 'user',
            'email' => 'user@example.com',
            'password' => bcrypt('password123')
        ]);
    }

    /** @test */
    public function non_admin_cannot_access_create_page()
    {
        $response = $this->actingAs($this->regularUser)->get('/services/create');
        $response->assertStatus(403);
    }

    /** @test */
    public function non_admin_cannot_delete_service()
    {
        $service = Service::create([
            'name' => 'Test Service',
            'details' => 'Test Details',
            'price' => 1000
        ]);
        
        $response = $this->actingAs($this->regularUser)->delete("/services/{$service->id}");
        $response->assertStatus(403);
    }
} 