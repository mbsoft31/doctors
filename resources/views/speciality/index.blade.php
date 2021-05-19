<div>

    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('All Specialities') }}
            </h2>
        </div>
    </header>

    <x-jet-banner />

    {{--<livewire:speciality.edit :inline="true" :show="false" />
    <livewire:speciality.delete :inline="true" :show="false" />--}}

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6 sm:mt-8 md:mt-12">
        <div class="mt-10 sm:mt-0 space-y-3">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">
                            {{ __("All Specialities") }}
                        </h3>
                        <p class="mt-1 text-sm text-gray-600">
                            {{ __("You can navigate all specialities and updates them.") }}
                        </p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div class="overflow-hidden sm:rounded-md">
                        <div class="bg-white space-y-6">
                            <div class="overflow-hidden min-w-full border-b border-gray-200">
                                <div class=" px-6 py-4 flex items-center">
                                    <h2 class="flex-grow">
                                        {{ __("All speciality") }}
                                    </h2>
                                    <div class="flex items-center space-x-2">
                                        <x-input.label for="search" :value="__('Search')" />
                                        <x-input.text id="search" class="w-72" wire:model="search" />
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col">
                                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                        <div class="overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                            <table class="min-w-full divide-y divide-gray-200">
                                                <thead class="bg-gray-50">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        {{ __("Name") }}
                                                    </th>
                                                    @can("update speciality")
                                                        <th scope="col" class="relative px-6 py-3">
                                                            <span class="sr-only">{{ __("Edit") }}</span>
                                                        </th>
                                                    @endcan
                                                    @can("delete speciality")
                                                        <th scope="col" class="relative px-6 py-3">
                                                            <span class="sr-only">{{ __("Delete") }}</span>
                                                        </th>
                                                    @endcan
                                                </tr>
                                                </thead>
                                                <tbody class="bg-white divide-y divide-gray-200">
                                                @foreach($specialities as $speciality)
                                                    <tr>
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            <div class="flex items-center">
                                                                <div class="text-sm font-medium text-gray-900">
                                                                    {{ $speciality->name }}
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-4">
                                                            @can("update speciality")<button wire:click="$emit('updateSpeciality', {{$speciality}})" class="text-indigo-600 hover:text-indigo-900">Edit</button>@endcan
                                                            @can("delete speciality")<button wire:click="$emit('deleteSpeciality', {{$speciality}})" class="text-red-600 hover:text-red-900">Delete</button>@endcan
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="overflow-hidden border-b border-gray-200">
                                <div class="px-6 py-2">
                                    {{ $specialities->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
