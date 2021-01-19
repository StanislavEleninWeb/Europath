<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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

        foreach($this->roles as $role){
        	$data[] = [
        		'name' => $role,
        	];
        }

        Role::insert($data);
    }
}
