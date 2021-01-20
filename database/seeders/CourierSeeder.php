<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Courier;

class CourierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Courier::factory()->count(3)->create();
    }
}
