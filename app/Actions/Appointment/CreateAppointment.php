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
     */
    public function create(array $input)
    {
        $validator = Validator::make($input, [
            'appointment_date' => ['required', 'date'],
            'appointment_time' => ['required', 'string'],
            'patient_id' => ['required', 'integer', 'exists:users,id'],
            'doctor_id' => ['required', 'integer', 'exists:users,id'],
            'status' => ['required', 'string', 'in:pending,accepted,delayed,passed'],
        ]);
        $validator->validate();

        $exists = Appointment::where("appointment_date", $input["appointment_date"])
            ->where("appointment_time", $input["appointment_time"])
            ->exists();

        if ($exists) throw new \Exception("validation data invalid", 401);

        /** @var Appointment $appointment */
        $appointment = Appointment::create([
            'appointment_date' => $input['appointment_date'],
            'appointment_time' => $input['appointment_time'],
            'patient_id' => $input['patient_id'],
            'doctor_id' => $input['doctor_id'],
            'status' => $input['status'] ?? 'pending',
        ]);


        return $appointment;

    }
}
