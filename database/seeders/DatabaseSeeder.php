<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::create([
            "name" => "admin",
        ]);

        $permission = Permission::create(["name" => "create role",]);


        $admin = User::create([
            "name" => "admin",
            "email" => "admin@mail.com",
            "phone" => "0666666666",
            "password" => Hash::make("admin1234"),
        ]);

        $role_admin->givePermissionTo('create role');

        $admin->assignRole('admin');

        if ($admin->hasRole('admin')){
            // execeti admin
        }

    }
}
