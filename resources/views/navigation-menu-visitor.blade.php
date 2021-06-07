<nav x-data="{ open: false }" class="bg-blue-700 text-white border-b border-blue-500 shadow-md">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex flex-grow justify-between">
                <!-- Logo -->
                <div class="flex-grow flex items-center">
                    <a href="{{ route('home') }}">
                        <x-jet-application-mark class="block h-9 w-auto text-white fill-current" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <a class="border-b-2 border-transparent focus:border-gray-100 focus:outline-none focus:text-gray-200 font-medium hover:border-gray-100 hover:text-gray-200 inline-flex items-center leading-5 pt-1 px-1 text-sm text-white transition" href="http://127.0.0.1:8000/login">
                        {{ __('Are you a Health practitioner ?') }}
                    </a>

                    <a class="border-b-2 border-transparent focus:border-gray-100 focus:outline-none focus:text-gray-200 font-medium hover:border-gray-100 hover:text-gray-200 inline-flex items-center leading-5 pt-1 px-1 text-sm text-white transition" href="http://127.0.0.1:8000/login">
                        {{ __('Need help ?') }}
                    </a>

                    <a class="border-b-2 border-transparent focus:border-gray-100 focus:outline-none focus:text-gray-200 font-medium hover:border-gray-100 hover:text-gray-200 inline-flex items-center leading-5 pt-1 px-1 text-sm text-white transition" href="http://127.0.0.1:8000/login">
                        {{ __('Login') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>
