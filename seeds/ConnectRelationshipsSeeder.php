<?php

use App\User;
use laravelrole\Models\Role;
use laravelrole\Models\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class ConnectRelationshipsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

	    /**
	     * Get Available Permissions
	     *
	     */
		$permissions = Permission::all();

	    /**
	     * Attach Permissions to Roles
	     *
	     */
		$roleAdmin = Role::where('name', '=', 'Admin')->first();
		foreach ($permissions as $permission) {
			$roleAdmin->attachPermission($permission);
		}

    }

}