<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;

class ServiceTransactionTest extends TestCase
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
    public function service_creation_is_atomic()
    {
        $serviceData = [
            'name' => 'Test Service',
            'details' => 'Test Details',
            'price' => 1000
        ];

        DB::beginTransaction();
        try {
            $service = Service::create($serviceData);
            throw new \Exception('Simulated error');
        } catch (\Exception $e) {
            DB::rollBack();
        }

        $this->assertDatabaseMissing('services', $serviceData);
    }

    /** @test */
    public function service_update_is_atomic()
    {
        $service = Service::create([
            'name' => 'Original Name',
            'details' => 'Original Details',
            'price' => 1000
        ]);

        $originalName = $service->name;

        DB::beginTransaction();
        try {
            $service->update(['name' => 'New Name']);
            throw new \Exception('Simulated error');
        } catch (\Exception $e) {
            DB::rollBack();
        }

        $this->assertDatabaseHas('services', [
            'id' => $service->id,
            'name' => $originalName
        ]);
    }
} 