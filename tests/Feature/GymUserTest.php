<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GymUserTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_user_can_scroll(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
