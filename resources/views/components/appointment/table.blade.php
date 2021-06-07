@props([ "appointments" => [] ])
<table>
    <thead>
    <tr>
        <th>
            {{ __("ID #") }}
        </th>
        <th>
            {{ __("Patient") }}
        </th>
        <th>
            {{ __("Doctor") }}
        </th>
        <th>
            {{ __("Appointment date") }}
        </th>
        <th>
            {{ __("Appointment time") }}
        </th>
        <th>
            {{ __("Status") }}
        </th>
        <th>
            {{ __("Actions") }}
        </th>
    </tr>
    </thead>

    <tbody>
    @foreach($appointments as $appointment)
        <tr>
            <td>
                {{ $appointment->id }}
            </td>
            <td>
                {{ $appointment->patient->name }}
            </td>
            <td>
                <a href="{{ route("doctor.profile", $appointment->doctor) }}">
                    {{ $appointment->doctor->name }}
                </a>
            </td>
            <td>
                {{ $appointment->appointment_date }}
            </td>
            <td>
                {{ $appointment->appointment_time }}
            </td>
            <td>
                {{ $appointment->status }}
            </td>
            <td>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>
