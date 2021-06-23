<x-visitor-layout>

    <div class="bg-blue-600 h-88">
        <div class="flex items-end w-full h-full bg-contain bg-no-repeat bg-right bg-opacity-0 md:bg-opacity-100" style="background-image: url('{{ asset('images/doctor-female.png') }}')">
            <div class="block px-10 py-10 max-w-lg space-y-6">
                <h1 class="text-5xl text-white font-serif font-bold tracking-wider leading-10">
                    {{ __("Doctor Finder") }}
                </h1>
                <div class="text-lg text-white">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem ipsa maiores nostrum pariatur sit tempore.
                </div>
                <div></div>
            </div>
        </div>
    </div>

    <div class="relative">
        <div class="relative w-full max-w-3xl mx-auto -mt-10">
            <div class="bg-white w-full px-8 pt-6 pb-8 space-y-4 rounded-md shadow">
                <x-jet-label for="search" value="{{ __('Search for doctor') }}" class="text-xl tracking-wide" />
                <x-input.text id="search" placeholder="Search for name, speciality, address" class="w-full text-xl"/>
            </div>
        </div>
        <div id="results" class="relative w-full max-w-3xl mt-1.5 mx-auto">
            <div class="bg-white w-full px-4 pt-6 pb-8 rounded-md shadow">
                @foreach($doctors as $doctor)
                    <div class="px-4 py-4 border border-gray-300">
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
                                <div class="mt-4 grid grid-cols-8 gap-1.5">
                                    @foreach(\App\Models\Appointment::$times as $time)
                                        <span class="inline px-1 py-1 text-xs text-center bg-gray-200 rounded-full">{{$time}}</span>
                                    @endforeach
                                </div>
                            </div>
                            <div>
                                <a href="{{ route("appointment.create", ["doctor"=>$doctor->id, "time"=>null]) }}" class="px-2 py-1.5 font-semibold tracking-wider text-blue-600 rounded-md border border-transparent hover:text-indigo-700 hover:border-indigo-700">
                                    {{ __("Make appointment") }}
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</x-visitor-layout>
