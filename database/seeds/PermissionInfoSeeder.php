<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Permisos\Models\Role;
use App\Permisos\Models\Permission;
use Illuminate\Support\Facades\Hash;

class PermissionInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Usuario
        $useradmin = User::where('email', 'admin@admin.com')->first();
        if(!$useradmin){
            $useradmin = User::create([
                'name'      =>  'admin',
                'email'     =>  'admin@admin.com',
                'password'  =>  Hash::make('admin')
            ]);
        }

        //Rol
        $roladmin = Role::where('name', 'admin')->first();
        if(!$roladmin){
            $roladmin = Role::create([
                'name'      =>  'Admin',
                'slug'     =>  'admin',
                'description'  =>  'Administrador',
                'full-access' => 'yes'
            ]);
        }

        $useradmin->roles()->sync([$roladmin->id]);

        $permission_all = [];
        //Permisos de los roles
        $permission = Permission::create([
            'name'          => 'List Role',
            'slug'          => 'role.index',
            'description'   => 'A user can list role'
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name'          => 'Show Role',
            'slug'          => 'role.show',
            'description'   => 'A user can see role'
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name'          => 'Create Role',
            'slug'          => 'role.create',
            'description'   => 'A user can create role'
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name'          => 'Edit Role',
            'slug'          => 'role.edit',
            'description'   => 'A user can edit role'
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name'          => 'Destroy Role',
            'slug'          => 'role.destroy',
            'description'   => 'A user can destroy role'
        ]);

        $permission_all[] = $permission->id;

        //Permisos de usuario
        $permission = Permission::create([
            'name'          => 'List user',
            'slug'          => 'user.index',
            'description'   => 'A user can list user'
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name'          => 'Show user',
            'slug'          => 'user.show',
            'description'   => 'A user can see user'
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name'          => 'Create user',
            'slug'          => 'user.create',
            'description'   => 'A user can create user'
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name'          => 'Edit user',
            'slug'          => 'user.edit',
            'description'   => 'A user can edit user'
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name'          => 'Destroy user',
            'slug'          => 'user.destroy',
            'description'   => 'A user can destroy user'
        ]);

        $permission_all[] = $permission->id;


        //Nuevos permisos
        $permission = Permission::create([
            'name'          => 'Show own user',
            'slug'          => 'userown.show',
            'description'   => 'A user can see own user'
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name'          => 'Edit own user',
            'slug'          => 'userown.edit',
            'description'   => 'A user can edit own user'
        ]);
    }
}
