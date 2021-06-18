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
            'time' => ['required', 'string'],
            'end' => ['nullable', 'date'],
            'patient_id' => ['required', 'integer', 'exists:users,id'],
            'doctor_id' => ['required', 'integer', 'exists:users,id'],
            'status' => ['required', 'string', 'in:pending,accepted,delayed,passed'],
        ]);
        $input = $validator->validate();

        $count = Appointment::where('start', $input['start'])
            ->where('time', $input['time'])->count();

        if ($count > 0) throw new ValidationException($validator, abort(403, "Time occupied"));


        /** @var Appointment $appointment */
        $appointment = Appointment::create([
            'start' => $input['start'],
            'time' => $input['time'],
            'end' => isset($input['end']) ? $input['end'] : null,
            'patient_id' => $input['patient_id'],
            'doctor_id' => $input['doctor_id'],
            'status' => $input['status'] ?? 'pending',
        ]);


        return $appointment;

    }
}
