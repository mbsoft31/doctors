<?php


namespace Database\Seeders;


use App\Actions\Auth\CreateAdmin;
use App\Actions\Auth\CreateDoctor;
use App\Actions\Auth\CreatePatient;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

class UserAndRoleSeeder extends Seeder
{

    public $actions = [
        'index' => 'viewAny',
        'show' => 'view',
        'create' => 'create',
        'store' => 'create',
        'edit' => 'update',
        'update' => 'update',
        'destroy' => 'delete',
    ];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $roles = [
            "admin" => [
                "permissions" => [
                    "role" => ["index", "show", "create", "store", "edit", "update", "destroy"],
                    "permission" => ["index", "show", "create", "store", "edit", "update", "destroy"],
                    "user" => ["index", "show", "create", "store", "edit", "update", "destroy"],
                    "speciality" => ["index", "show", "create", "store", "edit", "update", "destroy"],
                ],
            ],
            "doctor" => [
                "permissions" => [
                    "appointment" => ["index", "show", "create", "store", "edit", "update", "destroy", "delay"],
                ],
            ],
            "patient" => [
                "permissions" => [
                    "appointment" => ["index", "show", "create", "store", "edit", "update", "destroy"],
                    "doctor" => ["show"],
                ],
            ],

        ];

        foreach ($roles as $role => $permissions)
        {
            /** @var Role $r */
            $r = Role::findOrCreate($role);
            foreach ($permissions["permissions"] as $model => $actions)
            {
                foreach ($actions as $action)
                {
                    if (isset($this->actions[$action]))
                    {
                        $permission = $this->actions[$action] . " " . $model;
                        /** @var Permission $p */
                        $p = Permission::findOrCreate($permission);
                        $r->givePermissionTo($p);
                    }
                    else
                    {
                        $permission = $action . " " . $model;
                        /** @var Permission $p */
                        $p = Permission::findOrCreate($permission);
                        $r->givePermissionTo($p);
                    }
                }
            }
        }

        $users = require("users.php");

        foreach ($users as $user) {
            if ($user["type"] == "admin")
            {
                (new CreateAdmin())->create($user);
            }

            if ($user["type"] == "doctor")
            {
                (new CreateDoctor())->create($user);
            }

            if ($user["type"] == "patient")
            {
                (new CreatePatient())->create($user);
            }
        }

    }
}
