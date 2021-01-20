<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Office;

class OfficeSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Office::factory()->count(5)->create()->each(function($office){
            $office->city()->attach([3]);
        });
    }
}
