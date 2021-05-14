<?php


namespace Database\Seeders;


use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserAndRoleSeeder extends Seeder
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
        $role_doctor = Role::create([
            "name" => "doctor",
        ]);
        $role_patient = Role::create([
            "name" => "patient",
        ]);

        $permission = Permission::create(["name" => "create role",]);

        $admin = User::factory()->create([
            "name" => "admin",
            "email" => "admin@mail.com",
            "phone" => "0666666661",
            "password" => Hash::make("admin1234"),
        ]);
        $admin->assignRole($role_admin);

        $doctor = User::factory()->create([
            "name" => "doctor",
            "email" => "doctor@mail.com",
            "phone" => "0666666662",
            "password" => Hash::make("doctor1234"),
        ]);
        $doctor->assignRole($role_doctor);

        $patient = User::factory()->create([
            "name" => "patient",
            "email" => "patient@mail.com",
            "phone" => "0666666663",
            "password" => Hash::make("patient1234"),
        ]);
        $patient->assignRole($role_patient);

        $role_admin->givePermissionTo('create role');

        if ($doctor->hasRole('admin')){
            // execeti admin
        }
    }
}
