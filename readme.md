package folder structure

	│ composer.json
	|
	│ readme.md
	│
	├─config
	|
	│ roles.php
	│
	├─migrations
	│ 2016_01_15_105324_create_roles_table.php
	│ 2016_01_15_114412_create_role_user_table.php
	│ 2016_01_26_115212_create_permissions_table.php
	│ 2016_01_26_115523_create_permission_role_table.php
	│ 2016_02_09_132439_create_permission_user_table.php
	│
	├─seeds
	│ ConnectRelationshipsSeeder.php
	│ PackageSeeder.php
	│ PermissionsTableSeeder.php
	│ RolesTableSeeder.php
	│ UsersTableSeeder.php
	│
	└─src
		│ LaravelRoleServiceProvider.php
		│
		├─Exceptions
		│ AccessDeniedException.php
		│ LevelDeniedException.php
		│ PermissionDeniedException.php
		│ RoleDeniedException.php
		│
		├─Interfaces
		│ HasRoleAndPermission.php
		│ PermissionHasRelations.php
		│ RoleHasRelations.php
		│
		├─Models
		│ Permission.php
		│ Role.php
		│
		├─seeds
		│ ConnectRelationshipsSeeder.php
		│ PermissionsTableSeeder.php
		│ RolesTableSeeder.php
		│ UsersTableSeeder.php
		│
		├─Traits
		│  HasRoleAndPermission.php
		│  PermissionHasRelations.php
	    │  RoleHasRelations.php
		│  Slugable.php
		│  
 Package setup steps
 
1)add "harigokhe/dexbytes-laravel-role": "dev-master", in  composer file

2) composer update

3)add service provider in config/app.php in provider array 

 harigokhe\LaravelRoles\LaravelRoleServiceProvider::class
 
4)publish your package file 

php artisan vendor:publish --provider="harigokhe\LaravelRoles\LaravelRoleServiceProvider"

5) php artisan migrate

5)add class in user model

before class-  use harigokhe\LaravelRoles\Traits\HasRoleAndPermission;

after class-	use HasRoleAndPermission;


6) open file database/seeds/DatabaseSeeder.php 

add line inside run method

	$this->call(PermissionsTableSeeder::class);
	$this->call(RolesTableSeeder::class);
	$this->call(UsersTableSeeder::class);
	$this->call(ConnectRelationshipsSeeder::class);

7)Run command for admin/user role

php artisan db:seed 

	
	
 Seed an initial set of Permissions, Roles, and Users with roles. 
 #### Roles Seeded
|Property|Value|
|----|----|
|Name| Admin|
|Slug| admin|
|Description| Admin Role|
|Level| 2|

|Property|Value|
|----|----|
|Name| User|
|Slug| user|
|Description| User Role|
|Level| 1|

|Property|Value|
|----|----|
|Name| Unverified|
|Slug| unverified|
|Description| Unverified Role|
|Level| 0|

#### Permissions Seeded:
|Property|Value|
|----|----|
|name|Can View Users|
|slug|view.users|
|description|Can view users|
|model|Permission|

|Property|Value|
|----|----|
|name|Can Create Users|
|slug|create.users|
|description|Can create new users|
|model|Permission|

|Property|Value|
|----|----|
|name|Can Edit Users|
|slug|edit.users|
|description|Can edit users|
|model|Permission|

|Property|Value|
|----|----|
|name|Can Delete Users|
|slug|delete.users|
|description|Can delete users|
|model|Permission|


