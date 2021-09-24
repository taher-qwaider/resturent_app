<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Permission::updateOrCreate(['name'=>'create-users'],['name'=>'create-users', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'read-users'],['name'=>'read-users', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'edit-users'],['name'=>'edit-users', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'delete-users'],['name'=>'delete-users', 'guard_name' => 'user']);

        Permission::updateOrCreate(['name'=>'create-chefs'],['name'=>'create-chefs', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'read-chefs'],['name'=>'read-chefs', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'edit-chefs'],['name'=>'edit-chefs', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'delete-chefs'],['name'=>'delete-chefs', 'guard_name' => 'user']);

        Permission::updateOrCreate(['name'=>'create-settings'],['name'=>'create-settings', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'read-settings'],['name'=>'read-settings', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'edit-settings'],['name'=>'edit-settings', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'delete-settings'],['name'=>'delete-settings', 'guard_name' => 'user']);

        Permission::updateOrCreate(['name'=>'create-categories'],['name'=>'create-categories', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'read-categories'],['name'=>'read-categories', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'edit-categories'],['name'=>'edit-categories', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'delete-categories'],['name'=>'delete-categories', 'guard_name' => 'user']);

        Permission::updateOrCreate(['name'=>'create-meals'],['name'=>'create-meals', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'read-meals'],['name'=>'read-meals', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'edit-meals'],['name'=>'edit-meals', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'delete-meals'],['name'=>'delete-meals', 'guard_name' => 'user']);

        Permission::updateOrCreate(['name'=>'create-events'],['name'=>'create-events', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'read-events'],['name'=>'read-events', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'edit-events'],['name'=>'edit-events', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'delete-events'],['name'=>'delete-events', 'guard_name' => 'user']);

        Permission::updateOrCreate(['name'=>'create-reviews'],['name'=>'create-reviews', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'read-reviews'],['name'=>'read-reviews', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'edit-reviews'],['name'=>'edit-reviews', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'delete-reviews'],['name'=>'delete-reviews', 'guard_name' => 'user']);

        Permission::updateOrCreate(['name'=>'create-reservations'],['name'=>'create-reservations', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'read-reservations'],['name'=>'read-reservations', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'edit-reservations'],['name'=>'edit-reservations', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'delete-reservations'],['name'=>'delete-reservations', 'guard_name' => 'user']);

        Permission::updateOrCreate(['name'=>'create-social-media'],['name'=>'create-social-media', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'read-social-media'],['name'=>'read-social-media', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'edit-social-media'],['name'=>'edit-social-media', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'delete-social-media'],['name'=>'delete-social-media', 'guard_name' => 'user']);

        Permission::updateOrCreate(['name'=>'create-permissions'],['name'=>'create-permissions', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'read-permissions'],['name'=>'read-permissions', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'edit-permissions'],['name'=>'edit-permissions', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'delete-permissions'],['name'=>'delete-permissions', 'guard_name' => 'user']);

        Permission::updateOrCreate(['name'=>'create-roles'],['name'=>'create-roles', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'read-roles'],['name'=>'read-roles', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'edit-roles'],['name'=>'edit-roles', 'guard_name' => 'user']);
        Permission::updateOrCreate(['name'=>'delete-roles'],['name'=>'delete-roles', 'guard_name' => 'user']);

        Permission::updateOrCreate(['name'=>'edit-album'],['name'=>'edit-album', 'guard_name' => 'user']);

        Permission::updateOrCreate(['name'=>'read-messages'],['name'=>'read-messages', 'guard_name' => 'user']);

    }
}
