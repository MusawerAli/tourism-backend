<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'users']);
        Permission::create(['name' => 'users.viewAny']);
        Permission::create(['name' => 'users.view']);
        Permission::create(['name' => 'users.view.own']);
        Permission::create(['name' => 'users.create']);
        Permission::create(['name' => 'users.edit']);
        Permission::create(['name' => 'users.edit.own']);


        Permission::create(['name' => 'vehicles']);
        Permission::create(['name' => 'vehicles.viewAny']);
        Permission::create(['name' => 'vehicles.view']);
        Permission::create(['name' => 'vehicles.create']);
        Permission::create(['name' => 'vehicles.edit']);
        Permission::create(['name' => 'vehicles.view.own']);

        Permission::create(['name' => 'transfers']);
        Permission::create(['name' => 'transfers.viewAny']);
        Permission::create(['name' => 'transfers.view']);
        Permission::create(['name' => 'transfers.create']);
        Permission::create(['name' => 'transfers.edit']);
        Permission::create(['name' => 'transfers.view.own']);


        Permission::create(['name' => 'passangers']);
        Permission::create(['name' => 'passangers.viewAny']);
        Permission::create(['name' => 'passangers.view']);
        Permission::create(['name' => 'passangers.view.own']);
        Permission::create(['name' => 'passangers.create']);
        Permission::create(['name' => 'passangers.edit']);
        Permission::create(['name' => 'passangers.edit.own']);


        Permission::create(['name' => 'drivers']);
        Permission::create(['name' => 'drivers.viewAny']);
        Permission::create(['name' => 'drivers.view']);
        Permission::create(['name' => 'drivers.create']);
        Permission::create(['name' => 'drivers.edit']);
        Permission::create(['name' => 'drivers.edit.own']);
        Permission::create(['name' => 'drivers.view.own']);


        $roleAdmin = Role::create(['name' => 'admin']);
        $roleAdmin->givePermissionTo(Permission::all());

        $roleEditor = Role::create(['name' => 'editor']);

        $roleEditor->givePermissionTo('users');
        $roleEditor->givePermissionTo('users.viewAny');
        $roleEditor->givePermissionTo('users.view');
        $roleEditor->givePermissionTo('users.view.own');
        $roleEditor->givePermissionTo('users.create');
        $roleEditor->givePermissionTo('users.edit');
        $roleEditor->givePermissionTo('users.edit.own');


        $roleEditor->givePermissionTo('vehicles');
        $roleEditor->givePermissionTo('vehicles.viewAny');
        $roleEditor->givePermissionTo('vehicles.view');
        $roleEditor->givePermissionTo('vehicles.create');
        $roleEditor->givePermissionTo('vehicles.edit');

        $roleEditor->givePermissionTo('transfers');
        $roleEditor->givePermissionTo('transfers.viewAny');
        $roleEditor->givePermissionTo('transfers.view');
        $roleEditor->givePermissionTo('transfers.view.own');
        $roleEditor->givePermissionTo('transfers.create');
        $roleEditor->givePermissionTo('transfers.edit');



        $roleEditor->givePermissionTo('passangers');
        $roleEditor->givePermissionTo('passangers.viewAny');
        $roleEditor->givePermissionTo('passangers.view');
        $roleEditor->givePermissionTo('passangers.view.own');
        $roleEditor->givePermissionTo('passangers.create');
        $roleEditor->givePermissionTo('passangers.edit');
        $roleEditor->givePermissionTo('passangers.edit.own');

        $roleEditor->givePermissionTo('drivers');
        $roleEditor->givePermissionTo('drivers.viewAny');
        $roleEditor->givePermissionTo('drivers.view');
        $roleEditor->givePermissionTo('drivers.view.own');
        $roleEditor->givePermissionTo('drivers.create');
        $roleEditor->givePermissionTo('drivers.edit');
        $roleEditor->givePermissionTo('drivers.edit.own');



        $driver = Role::create(['name' => 'driver']);
        $driver->givePermissionTo('users.view');
        $driver->givePermissionTo('users.view.own');
        $driver->givePermissionTo('users.edit.own');


        $driver->givePermissionTo('transfers');
        $driver->givePermissionTo('transfers.view.own');

        $driver->givePermissionTo('drivers');
        $driver->givePermissionTo('drivers.viewAny');
        $driver->givePermissionTo('drivers.view');

        $driver->givePermissionTo('drivers.view.own');

        Role::create(['name' => 'patient']);
        Role::create(['name' => 'staff']);
    }
}
