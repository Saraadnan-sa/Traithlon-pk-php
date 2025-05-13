<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class ProfileControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_edit_profile_page_exists()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/profile/edit');
        $response->assertStatus(200); // Ensure the route/view actually exists
        $response->assertViewIs('profile.edit');
    }

    public function test_update_profile_success()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $data = [
            'name' => 'Updated Name',
            'email' => 'updated@example.com',
        ];

        $response = $this->put('/profile/update', $data);
        $response->assertRedirect(route('profile.edit'));
        $response->assertSessionHas('status', 'profile-updated');
        $this->assertDatabaseHas('users', ['email' => 'updated@example.com']);
    }

    public function test_update_profile_validation_error()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $data = [
            'name' => '', // Invalid
            'email' => 'not-an-email',
        ];

        $response = $this->put('/profile/update', $data);
        $response->assertSessionHasErrors(['name', 'email']);
    }

    public function test_destroy_profile_success()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->delete('/profile/destroy');
        $response->assertRedirect('/');
        $this->assertAuthenticated();

    }

    public function test_guest_cannot_edit_profile()
    {
        $response = $this->get('/profile/edit');
        $response->assertRedirect('/login');
    }

    public function test_guest_cannot_update_or_delete_profile()
    {
        $response = $this->put('/profile/update', []);
        $response->assertRedirect('/login');

        $response = $this->delete('/profile/destroy');
        $response->assertRedirect('/login');
    }
}
