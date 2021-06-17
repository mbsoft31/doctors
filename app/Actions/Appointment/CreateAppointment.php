<?php


namespace App\Actions\Appointment;


use App\Models\Appointment;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class CreateAppointment
{
    /**
     * @param array $input
     * @return Appointment
     * @throws ValidationException
     * @throws \Exception
     */
    public function create(array $input)
    {
        $validator = Validator::make($input, [
            'start' => ['required', 'date'],
            'end' => ['required', 'date'],
            'patient_id' => ['required', 'integer', 'exists:users,id'],
            'doctor_id' => ['required', 'integer', 'exists:users,id'],
            'status' => ['required', 'string', 'in:pending,accepted,delayed,passed'],
        ]);
        $input = $validator->validate();

        $count = Appointment::whereBetween( "start", [ $input["start"], $input["end"] ] )
            ->orWhereBetween( "end", [ $input["start"], $input["end"] ] )
            ->count();

        if ($count > 0) throw new \Exception("validation data invalid", 401);

        /** @var Appointment $appointment */
        $appointment = Appointment::create([
            'start' => $input['start'],
            'end' => $input['end'],
            'patient_id' => $input['patient_id'],
            'doctor_id' => $input['doctor_id'],
            'status' => $input['status'] ?? 'pending',
        ]);


        return $appointment;

    }
}
