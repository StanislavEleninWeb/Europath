<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CarFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Car::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'office_id' => rand(1,5),
            'brand' => $this->faker->name(),
            'model' => $this->faker->name(),
            'registration' => Str::random(8),
            'fuel' => $this->faker->word(),
            'fuel_consumption' => rand(5,10),
        ];
    }
}
