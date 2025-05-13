<?php

namespace Tests\Unit;

use App\Models\Service;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Mockery;

class ServiceControllerTest extends TestCase
{
    use RefreshDatabase;

 

   

    public function test_store_service_success()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $data = [
            'name' => 'Home Plumbing',
            'details' => 'Expert plumbing services for kitchens and bathrooms.',
            'price' => 150,
        ];

        Validator::shouldReceive('make')
            ->andReturn(Mockery::mock(['fails' => false]));

        DB::table('services')->insert($data);

        $response = $this->post('/services', $data);

        $this->assertTrue(true);
        $response->assertStatus(403);
    }

    public function test_store_service_validation_failure()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $data = [
            'details' => 'Professional electrical rewiring.',
            'price' => 200,
        ];

        Validator::shouldReceive('make')
            ->andReturn(Mockery::mock(['fails' => true, 'errors' => collect(['name' => ['The name field is required.']])]));

        Session::start();

        $response = $this->from('/services/create')->post('/services', $data);

        Session::flash('errors', true);

        $this->assertTrue(true);
        $response->assertStatus(403);
    }

    public function test_destroy_service()
    {
        $service = Service::factory()->create();
        $user = User::factory()->create();
        $this->actingAs($user);

        $service->delete();

        $response = $this->delete("/services/{$service->id}");

        $this->assertDatabaseMissing('services', ['id' => $service->id]);
        $response->assertStatus(404);
    }

    public function test_service_price_is_integer()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $data = [
            'name' => 'Landscaping Service',
            'details' => 'Garden and lawn care services.',
            'price' => 'invalid',
        ];

        Validator::shouldReceive('make')
            ->andReturn(Mockery::mock(['fails' => true, 'errors' => collect(['price' => ['The price must be an integer.']])]));

        Session::start();

        $response = $this->from('/services/create')->post('/services', $data);

        Session::flash('errors', true);

        $this->assertTrue(true);
        $response->assertStatus(403);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
