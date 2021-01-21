<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Courier;

class CourierFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Courier::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user_ids = [1,2,3,4,5,6,7,8,9,10];
        shuffle($user_ids);

        return [
            'id' => array_pop($user_ids),
            'uuid' => Str::uuid(),
            'office_id' => rand(1,5),
        ];
    }
}
