<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }} rania
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="px-6 py-2 space-x-2">
                    hello {{ Auth::user()->email }}
                </div>
                <div class="px-6 py-2 space-x-2">
                    <x-button type="default" color="gray">Click me</x-button>
                    <x-button type="default" color="blue">Click me</x-button>
                    <x-button type="default" color="red">Click me</x-button>
                    <x-button type="default" color="green">Click me</x-button>
                </div>
                <div class="px-6 py-2 space-x-2">
                    <x-button type="outline" color="gray">Click me</x-button>
                    <x-button type="outline" color="blue">Click me</x-button>
                    <x-button type="outline" color="red">Click me</x-button>
                    <x-button type="outline" color="green">Click me</x-button>
                </div>
                <div class="px-6 py-2 space-x-2">
                    <x-dropdown-alpine align="left">
                        <x-slot name="trigger">
                            <x-button type="outline" color="gray">
                                Click me
                            </x-button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown.item wrapTag="div">item 1</x-dropdown.item>
                            <x-dropdown.item wrapTag="div">item 2</x-dropdown.item>
                            <x-dropdown.item wrapTag="div">item 3</x-dropdown.item>
                        </x-slot>
                    </x-dropdown-alpine>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
