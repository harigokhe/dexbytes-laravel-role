
/*
 |------------------------------------------------
 | Package Folder structure
 |------------------------------------------------
 */
 
 └───dexbytes
		└───LaravelRole
			│   composer.json
			│   readme.md
			│
			├───config
			│       roles.php
			│
			├───migrations
			│       2016_01_15_105324_create_roles_table.php
			│       2016_01_15_114412_create_role_user_table.php
			│       2016_01_26_115212_create_permissions_table.php
			│       2016_01_26_115523_create_permission_role_table.php
			│       2016_02_09_132439_create_permission_user_table.php
			│
			├───seeds
			│       ConnectRelationshipsSeeder.php
			│       PackageSeeder.php
			│       PermissionsTableSeeder.php
			│       RolesTableSeeder.php
			│       UsersTableSeeder.php
			│
			└───src
				│   LaravelRoleServiceProvider.php
				│
				├───Exceptions
				│       AccessDeniedException.php
				│       LevelDeniedException.php
				│       PermissionDeniedException.php
				│       RoleDeniedException.php
				│
				├───Interfaces
				│       HasRoleAndPermission.php
				│       PermissionHasRelations.php
				│       RoleHasRelations.php
				│
				├───Models
				│       Permission.php
				│       Role.php
				│
				├───seeds
				│       ConnectRelationshipsSeeder.php
				│       PackageSeeder.php
				│       PermissionsTableSeeder.php
				│       RolesTableSeeder.php
				│       UsersTableSeeder.php
				│
				└───Traits
						HasRoleAndPermission.php
						PermissionHasRelations.php
						RoleHasRelations.php
						Slugable.php
/*
 |---------------------------------------------------------
 | package setup steps
 |---------------------------------------------------------
 */
 
 1)include packages folder in root directory
2)open composer.json and set path for  packages as below
"psr-4": {
            "App\\": "app/",																			
    --->    "LaravelRole\\":"packages/dexbytes/LaravelRole/src"  <------ set path -------
        }
3)go to config/app.php and open it,in provider array include class name path below the Package
  Service Providers comment section
 -> \LaravelRole\LaravelRoleServiceProvider::class,


4) run command for run package  : composer dumpautoload

5)go to in project folder from terminal,migrate packages table using this command
   
  -> php artisan migrate --path packages/dexbytes/LaravelRole/migrations
  
6)copy role.php from packages/dexbytes/LaravelRole/config and paste it in root config folder 

7)open database/Seeds/DatabaseSeeder.php file 
add this line before class 			-> use LaravelRole\seeds\PackageSeeder;
add this line inside run method 	->$this->call(\PackageSeeder::class);

8)open project composer file
set path for  seed  record in autoload key on classmap array 
"autoload": {
        "classmap": [
            "database",
           "database/factories",
            "packages/dexbytes/LaravelRole/seeds"  <-----------package seed path set
             ],
        "psr-4": {
            "App\\": "app/",
            "Tests\\": "tests/",
            "LaravelRole\\":"packages/dexbytes/LaravelRole/src"<------package namespace set
        }
    },
 

9) run command for reload composer -> composer dumpautoload
10) seed dummy records for running user role management package
	run command -> php artisan db:seed

/*
 |-----------------------------------------------------------------
 | Seed an initial set of Permissions, Roles, and Users with roles.
 |-----------------------------------------------------------------
 */	

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


