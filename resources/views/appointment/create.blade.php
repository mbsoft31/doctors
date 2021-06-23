<x-app-layout>

    <div class="max-w-3xl mx-auto py-12">
        @if( !is_null($doctor) && $doctor)
            <div class="text-lg font-semibold tracking-wider text-gray-800">
                {{ __("Appointment at:") }}
            </div>
            <div class="mt-3 px-4 py-4 bg-white border border-gray-50 rounded-md shadow">
                <div class="flex items-center space-x-6">
                    <div>
                        <img class="w-16 h-16 rounded-full object-center object-cover" src="{{$doctor->profile_photo_url}}" alt="doctor-{{$doctor->id}}">
                    </div>
                    <div class="flex-grow align-center">
                        <div class="text-lg font-semibold tracking-wider text-gray-800">
                            <a href="{{$doctor->doctor_profile()}}">{{ $doctor->name }}</a>
                        </div>
                        <div class="mt-2 inline-block text-sm tracking-widest text-gray-600">
                            {{ $doctor->speciality }}
                        </div>
                    </div>
                    <div>
                        <a target="_blank" href="{{ route("doctor.profile", $doctor) }}" class="px-2 py-1.5 font-semibold tracking-wider text-blue-600 rounded-md border border-transparent hover:text-indigo-700 hover:border-indigo-700">
                            {{ __("See Profile") }}
                        </a>
                    </div>
                </div>
            </div>
        @endif
        <div class="mt-3 px-6 py-4 bg-white rounded-md shadow">
            <form action="{{ route("appointment.store") }}" method="POST">
                @csrf
                <x-appointment.form :doctors="$doctors" :times="$times" :doctor="$doctor ?? null"/>
                <input class="mt-4 px-4 py-2 text-white bg-indigo-600 rounded-md shadow" type="submit" value="{{ __("Make appointment") }}">
            </form>
        </div>

    </div>

</x-app-layout>
