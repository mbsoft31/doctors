<?php


namespace App\Actions\Auth;


use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Traits\HasRoles;

class CreatePatient
{
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:13'],
            'type' => ['required', 'in:doctor,patient'],
            'password' => ['required', 'string'/*, 'confirmed'*/],
        ])->validate();

        /** @var HasRoles $user */
        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'type' => "patient",
            'password' => Hash::make($input['password']),
        ]);

        $user->assignRole(["patient"]);

        return $user;

    }
}
