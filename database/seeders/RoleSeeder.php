<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Carbon\Carbon;
use App\Models\Role;

class RoleSeeder extends Seeder
{

	private $roles = [
		'guest',
		'client',
		'courier',
		'manager',
		'developer',
	];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$data = [];

        $now = Carbon::now();

        foreach($this->roles as $role){
        	$data[] = [
        		'name' => $role,
                'created_at' => $now,
                'updated_at' => $now,
        	];
        }

        Role::insert($data);
    }
}
