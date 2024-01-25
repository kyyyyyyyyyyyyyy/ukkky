<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Permission = Permission::create(['name' => 'album']);
        $Permission = Permission::create(['name' => 'user']);
        
        $role = Role::create(['name' => 'admin']);
        $role = Role::create(['name' => 'user']);

        $roleadmin = Role::findByName('admin');
        $roleadmin->givePermissionTo('album');
        $roleadmin->givePermissionTo('user');

        $rolepimpinan = Role::findByName('user');
        $rolepimpinan->givePermissionTo('album');

    }
}
