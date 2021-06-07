@props([ "appointments" => [] ])
<table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
    <tr>
        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase tracking-wider">
            {{ __("ID #") }}
        </th>
        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase tracking-wider">
            {{ __("Patient") }}
        </th>
        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase tracking-wider">
            {{ __("Doctor") }}
        </th>
        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase tracking-wider">
            {{ __("Appointment date") }}
        </th>
        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase tracking-wider">
            {{ __("Appointment time") }}
        </th>
        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase tracking-wider">
            {{ __("Status") }}
        </th>
        <th scope="col" class="relative px-6 py-3">
            {{ __("Actions") }}
        </th>
    </tr>
    </thead>

    <tbody class="bg-white divide-y divide-gray-200">
    @forelse($appointments as $appointment)
        <tr>
            <td class="px-6 py-4">
                {{ $appointment->id }}
            </td>
            <td class="px-6 py-4">
                {{ $appointment->patient->name }}
            </td>
            <td class="px-6 py-4">
                <a href="{{ route("doctor.profile", $appointment->doctor) }}">
                    {{ $appointment->doctor->name }}
                </a>
            </td>
            <td class="px-6 py-4">
                {{ (new \Carbon\Carbon($appointment->appointment_date))->diffForHumans() }}
            </td>
            <td class="px-6 py-4">
                {{ $appointment->appointment_time }}
            </td>
            <td class="px-6 py-4">
                {{ $appointment->status }}
            </td>
            <td class="px-6 py-4 space-x-2 whitespace-nowrap text-end text-sm font-medium">
                <x-appointment.action-button :status="$appointment->status" :appointment="$appointment" />
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="7"  class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                <div class="text-sm text-gray-900">
                    {{ __('nothing to show !') }}
                </div>
            </td>
        </tr>
    @endforelse
    </tbody>
</table>
