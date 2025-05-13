<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class IntegrationTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected $admin;
    protected $regularUser;

    protected function setUp(): void
    {
        parent::setUp();
        
        // Create admin user
        $this->admin = User::factory()->create([
            'role' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password123')
        ]);

        // Create regular user
        $this->regularUser = User::factory()->create([
            'role' => 'user',
            'email' => 'user@example.com',
            'password' => bcrypt('password123')
        ]);
    }

    /** @test */
    public function admin_can_login_and_access_dashboard()
    {
        $response = $this->post('/login', [
            'email' => 'admin@example.com',
            'password' => 'password123'
        ]);

        $response->assertRedirect('/');
        $this->assertAuthenticated();
    }

    /** @test */
    public function unauthorized_user_cannot_access_admin_dashboard()
    {
        $response = $this->get('/services');
        $response->assertRedirect('/login');
    }

    /** @test */
    public function admin_can_create_new_service()
    {
        $this->actingAs($this->admin);

        $response = $this->post('/services', [
            'name' => 'New Service',
            'details' => 'Service Details',
            'price' => 1000
        ]);

        $response->assertRedirect('/services');
        $this->assertDatabaseHas('services', [
            'name' => 'New Service',
            'details' => 'Service Details',
            'price' => 1000
        ]);
    }

    /** @test */
    public function admin_can_update_existing_service()
    {
        $this->actingAs($this->admin);
        $service = Service::create([
            'name' => 'Original Service',
            'details' => 'Original Details',
            'price' => 1000
        ]);

        $response = $this->put("/services/{$service->id}", [
            'name' => 'Updated Service',
            'details' => 'Updated Details',
            'price' => 2000
        ]);

        $response->assertRedirect('/services');
        $this->assertDatabaseHas('services', [
            'id' => $service->id,
            'name' => 'Updated Service',
            'details' => 'Updated Details',
            'price' => 2000
        ]);
    }

    /** @test */
    public function admin_can_delete_service()
    {
        $this->actingAs($this->admin);
        $service = Service::create([
            'name' => 'Service to Delete',
            'details' => 'Details',
            'price' => 1000
        ]);

        $response = $this->delete("/services/{$service->id}");
        $response->assertRedirect('/services');
        $this->assertDatabaseMissing('services', ['id' => $service->id]);
    }

    /** @test */
    public function regular_user_cannot_perform_crud_operations()
    {
        $this->actingAs($this->regularUser);
        $service = Service::create([
            'name' => 'Test Service',
            'details' => 'Test Details',
            'price' => 1000
        ]);

        // Try to create
        $response = $this->post('/services', [
            'name' => 'New Service',
            'details' => 'Details',
            'price' => 1000
        ]);
        $response->assertStatus(403);

        // Try to update
        $response = $this->put("/services/{$service->id}", [
            'name' => 'Updated Service',
            'details' => 'Updated Details',
            'price' => 2000
        ]);
        $response->assertRedirect('/services');

        // Try to delete
        $response = $this->delete("/services/{$service->id}");
        //$response->assertRedirect('/services');
    }

    /** @test */
    public function unauthorized_access_redirects_to_login()
    {
        $response = $this->get('/services');
        $response->assertRedirect('/login');
    }
} 