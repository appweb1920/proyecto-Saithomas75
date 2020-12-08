<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Permisos\Models\Role;
use App\Permisos\Models\Permission;
use App\Posts\Models\Gender;
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
        //Usuario Administrador
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
                'name'      =>  'Administrador',
                'slug'     =>  'admin',
                'description'  =>  'Administrador',
                'full-access' => 'yes'
            ]);
        }

        $useradmin->roles()->sync([$roladmin->id]);

        $roluser = Role::create([
            'name'      =>  'Registered User',
            'slug'     =>  'registereduser',
            'description'  =>  'Registered User',
            'full-access' => 'no'
        ]);

        //Permisos de los roles
        $permission = Permission::create([
            'name'          => 'List Role',
            'slug'          => 'role.index',
            'description'   => 'A user can list role'
        ]);

        $permission = Permission::create([
            'name'          => 'Show Role',
            'slug'          => 'role.show',
            'description'   => 'A user can see role'
        ]);

        $permission = Permission::create([
            'name'          => 'Create Role',
            'slug'          => 'role.create',
            'description'   => 'A user can create role'
        ]);

        $permission = Permission::create([
            'name'          => 'Edit Role',
            'slug'          => 'role.edit',
            'description'   => 'A user can edit role'
        ]);

        $permission = Permission::create([
            'name'          => 'Destroy Role',
            'slug'          => 'role.destroy',
            'description'   => 'A user can destroy role'
        ]);

        //Permisos de usuario
        $permission = Permission::create([
            'name'          => 'List user',
            'slug'          => 'user.index',
            'description'   => 'A user can list user'
        ]);

        $permission = Permission::create([
            'name'          => 'Show user',
            'slug'          => 'user.show',
            'description'   => 'A user can see user'
        ]);

        $permission = Permission::create([
            'name'          => 'Create user',
            'slug'          => 'user.create',
            'description'   => 'A user can create user'
        ]);

        $permission = Permission::create([
            'name'          => 'Edit user',
            'slug'          => 'user.edit',
            'description'   => 'A user can edit user'
        ]);

        $permission = Permission::create([
            'name'          => 'Destroy user',
            'slug'          => 'user.destroy',
            'description'   => 'A user can destroy user'
        ]);

        $permission = Permission::create([
            'name'          => 'Show own user',
            'slug'          => 'userown.show',
            'description'   => 'A user can see own user'
        ]);

        $permission = Permission::create([
            'name'          => 'Edit own user',
            'slug'          => 'userown.edit',
            'description'   => 'A user can edit own user'
        ]);

        $roluser->permissions()->sync([11, 12]);

        //Generos
        $gender = Gender::create([
            'name'  => 'épica'
        ]);

        $gender = Gender::create([
            'name'  => 'cuento'
        ]);

        $gender = Gender::create([
            'name'  => 'novela'
        ]);

        $gender = Gender::create([
            'name'  => 'fábula'
        ]);

        $gender = Gender::create([
            'name'  => 'canción'
        ]);

        $gender = Gender::create([
            'name'  => 'himno'
        ]);

        $gender = Gender::create([
            'name'  => 'sátira'
        ]);

        $gender = Gender::create([
            'name'  => 'romance'
        ]);

        $gender = Gender::create([
            'name'  => 'soneto'
        ]);

        $gender = Gender::create([
            'name'  => 'tragedia'
        ]);

        $gender = Gender::create([
            'name'  => 'melodrama'
        ]);

        $gender = Gender::create([
            'name'  => 'comedia'
        ]);

        $gender = Gender::create([
            'name'  => 'tragicomedia'
        ]);

        $gender = Gender::create([
            'name'  => 'ensayo'
        ]);

        $gender = Gender::create([
            'name'  => 'biografía'
        ]);

        $gender = Gender::create([
            'name'  => 'crónica'
        ]);

    }
}
