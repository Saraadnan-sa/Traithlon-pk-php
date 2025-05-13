<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ServicePaginationTest extends TestCase
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
        
        // Create 15 services
        for ($i = 1; $i <= 15; $i++) {
            Service::create([
                'name' => "Service {$i}",
                'details' => "Details for service {$i}",
                'price' => 1000 * $i
            ]);
        }
    }

    /** @test */
    public function services_page_returns_paginated_results()
    {
        $response = $this->actingAs($this->admin)->get('/services?page=1');
        $response->assertStatus(200);
        $response->assertViewHas('services');
        $this->assertCount(15, $response->viewData('services'));
    }

    /** @test */
    public function services_can_be_filtered_by_name()
    {
        $service = Service::create([
            'name' => 'Unique Service',
            'details' => 'Unique Details',
            'price' => 1000
        ]);
        
        $response = $this->actingAs($this->admin)->get('/services?search=Unique');
        $response->assertStatus(200);
        $response->assertSee('Unique Service');
    }

    /** @test */
    public function unauthenticated_user_is_redirected_to_login()
    {
        $response = $this->get('/services');
        $response->assertRedirect('/login');
    }
} 