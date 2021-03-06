<?php


namespace App\Actions\Auth;


use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Traits\HasRoles;

class CreateDoctor
{
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:13'],
            'type' => ['required', 'in:doctor,patient'],
            'speciality_id' => ['required', 'integer', 'exists:specialities,id'],
            'password' => ['required', 'string'/*, 'confirmed'*/],
        ])->validate();

        /** @var HasRoles $user */
        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'type' => "doctor",
            'password' => Hash::make($input['password']),
        ]);

        $user->setSpeciality($input['speciality_id']);

        $user->assignRole(["doctor"]);

        return $user;

    }
}
