<?php


namespace App\Actions\Auth;


use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Traits\HasRoles;

class CreateAdmin
{
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:13'],
            'password' => ['required', 'string'/*, 'confirmed'*/],
        ])->validate();

        /** @var HasRoles $user */
        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'type' => "admin",
            'password' => Hash::make($input['password']),
        ]);

        $user->assignRole(["admin"]);

        return $user;

    }
}
