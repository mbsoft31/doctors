@props(["doctor" => null, "patient" => Auth::user()])

<div>

    <div>
        <label for="appointment_date">
            {{ __("Start date") }}
        </label>
        <input class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" type="date" id="start" name="start">
    </div>

    <div>
        <label for="appointment_time">
            {{ __("End date") }}
        </label>
        <input class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" type="date" id="end" name="end">
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
