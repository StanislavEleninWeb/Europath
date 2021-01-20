<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$roles = Role::all()->pluck('id');

        User::factory()->count(10)->create()->each(function($user) use ($roles){
        	$user->roles()->attach([$roles->random()]);
        });
    }
}
