@props(["doctor" => null, "patient" => Auth::user()])

<div>

    <div>
        <label for="appointment_date">
            {{ __("Appointment date") }}
        </label>
        <input class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" type="text" id="appointment_date" name="appointment_date">
    </div>

    <div>
        <label for="appointment_time">
            {{ __("Appointment time") }}
        </label>
        <input class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" type="text" id="appointment_time" name="appointment_time">
    </div>

    @if(isset($doctor) && ! is_null($doctor))
        <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
    @else
        <div>
            <label for="doctor">
                {{ __("Doctor") }}
            </label>
            <input class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" type="text" id="doctor" name="doctor_id">
        </div>
    @endif

    @if(isset($patient) && ! is_null($patient))
        <input type="hidden" name="patient_id" value="{{ $patient->id }}">
    @else
        <div>
            <label for="patient">
                {{ __("Patient") }}
            </label>
            <input class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" type="text" id="patient" name="patient_id">
        </div>
    @endif

    <input type="hidden" name="status" id="status" value="pending">

</div>
