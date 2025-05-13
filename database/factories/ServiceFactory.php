<?php
// In database/factories/ServiceFactory.php
namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    protected $model = Service::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'details' => $this->faker->text,
            'price' => $this->faker->numberBetween(100, 1000),
        ];
    }
}
