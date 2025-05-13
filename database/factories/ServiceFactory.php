<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    protected $model = Service::class;

    public function definition()
    {
        return [
            'name' => $this->faker->words(3, true),
            'details' => $this->faker->paragraph,
            'price' => $this->faker->numberBetween(1000, 10000),
        ];
    }
} 