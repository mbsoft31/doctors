<nav x-data="{ open: false }" class="bg-blue-700 text-white border-b border-blue-500 shadow-md">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex flex-grow justify-between">
                <!-- Logo -->
                <div class="flex-grow flex items-center">
                    <a href="/">
                        <x-jet-application-mark class="block h-9 w-auto text-white fill-current" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    @guest
                        <a href="http://127.0.0.1:8000/register-doctor" class="border-b-2 border-transparent focus:border-gray-100 focus:outline-none focus:text-gray-200 font-medium hover:border-gray-100 hover:text-gray-200 inline-flex items-center leading-5 pt-1 px-1 text-sm text-white transition">
                            {{ __('Are you a Health practitioner ?') }}
                        </a>

                        <a href="http://127.0.0.1:8000/register-patient" class="border-b-2 border-transparent focus:border-gray-100 focus:outline-none focus:text-gray-200 font-medium hover:border-gray-100 hover:text-gray-200 inline-flex items-center leading-5 pt-1 px-1 text-sm text-white transition">
                            {{ __('Want to find your doctor ?') }}
                        </a>

                        <a href="#" class="border-b-2 border-transparent focus:border-gray-100 focus:outline-none focus:text-gray-200 font-medium hover:border-gray-100 hover:text-gray-200 inline-flex items-center leading-5 pt-1 px-1 text-sm text-white transition">
                            {{ __('Need help ?') }}
                        </a>

                        <a href="http://127.0.0.1:8000/login" class="border-b-2 border-transparent focus:border-gray-100 focus:outline-none focus:text-gray-200 font-medium hover:border-gray-100 hover:text-gray-200 inline-flex items-center leading-5 pt-1 px-1 text-sm text-white transition">
                            {{ __('Login') }}
                        </a>

                    @endguest

                    @auth
                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            <!-- Settings Dropdown -->
                            <div class="ml-3 relative">
                                <x-jet-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                            <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                            </button>
                                        @else
                                            <span class="inline-flex rounded-md">
                                        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                            {{ Auth::user()->name }}

                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </span>
                                        @endif
                                    </x-slot>

                                    <x-slot name="content">
                                        <!-- Account Management -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Manage Account') }}
                                        </div>

                                        <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                            {{ __('Profile') }}
                                        </x-jet-dropdown-link>

                                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                            <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                                {{ __('API Tokens') }}
                                            </x-jet-dropdown-link>
                                        @endif

                                        <div class="border-t border-gray-100"></div>

                                        <!-- Authentication -->
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <x-jet-dropdown-link href="{{ route('logout') }}"
                                                                 onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                                {{ __('Log Out') }}
                                            </x-jet-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-jet-dropdown>
                            </div>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</nav>
