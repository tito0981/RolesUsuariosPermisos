<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Permission\Models\Role;
use App\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RolesPermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// Truncate tables
    	DB::statement("SET foreign_key_checks=0");
 // truncar con DB
    		DB::table('role_user')->truncate();
    		DB::table('permission_role')->truncate();
//o truncar con eloquent
    		Permission::truncate();
    		Role::truncate();
    	DB::statement("SET foreign_key_checks=1");

        // User Admin
    	$useradmin =User::where('email','admin@admin.com')->first();
    	if($useradmin){
    		$useradmin->delete();
    	}
    	$useradmin = User::create([
	        'name' => 'admin',
	        'email' => 'admin@admin.com',
	        'password' => Hash::make('admin')
    	]);

    	// Rol Admin
    	$roladmin = Role::create([
    		'name'=>'Admin',
    		'slug'=>'admin',
    		'description'=>'Administrator',
    		'full-access'=>'yes',
    	]);

    	$useradmin->roles()->sync([ $roladmin->id]);

    	// Permisos

    	$permission_all = [];

    	//Permission role
    	//Roles
        $permission = Permission::create([
            'name' => 'Navegar roles',
            'slug' => 'rol.index',
            'table_name' => 'roles',
            'description' => 'Lista y navega todos los roles del sistema'
        ]);
		$permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Ver detalle de roles',
            'slug' => 'rol.show',
            'table_name' => 'roles',
            'description' => 'Ver en detalle cada rol del sistema'
        ]);
		$permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Creacion de roles',
            'slug' => 'rol.create',
            'table_name' => 'roles',
            'description' => 'Editar cualquier dato de un rol del sistema'
        ]);
		$permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Edicion de roles',
            'slug' => 'rol.edit',
            'table_name' => 'roles',
            'description' => 'Editar cualquier dato de un rol del sistema'
        ]);
		$permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Eliminar rol',
            'slug' => 'rol.destroy',
            'table_name' => 'roles',
            'description' => 'Elimina roles del sistema'
        ]);
		$permission_al[] = $permission->id;

        //Users
        $permission = Permission::create([
            'name' => 'Navegar usuarios',
            'slug' => 'user.index',
            'table_name' => 'users',
            'description' => 'Lista y navega todos los usuarios del sistema',
        ]);
		$permission_al[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Ver detalle de usuarios',
            'slug' => 'user.show',
            'table_name' => 'users',
            'description' => 'Ver en detalle cada usuario del sistema',
        ]);
		$permission_al[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Edicion de usuarios',
            'slug' => 'user.edit',
            'table_name' => 'users',
            'description' => 'Editar cualquier dato de un usuario del sistema',
        ]);
		$permission_al[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Eliminar usuario',
            'slug' => 'user.destroy',
            'table_name' => 'users',
            'description' => 'Elimina usuarios del sistema',
        ]);
		$permission_al[] = $permission->id;

	//$roladmin->permissions()->sync( $permission_all );

    }
}
