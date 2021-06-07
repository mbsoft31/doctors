<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }} rania
        </h2>
    </x-slot>

    <div class="py-12 space-y-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg">
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
                <div class="flex px-6 py-2 space-x-2">
                    <x-dropdown-alpine class="" align="left">
                        <x-slot name="trigger">
                            <x-button type="outline" color="gray">
                                Click me
                            </x-button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown.item :wrapped="true" wrapTag="div">item 1</x-dropdown.item>
                            <x-dropdown.item :wrapped="true" wrapTag="div">item 2</x-dropdown.item>
                            <div class="border-t border-gray-100"></div>
                            <x-dropdown.item :wrapped="true" wrapTag="div">item 3</x-dropdown.item>
                        </x-slot>
                    </x-dropdown-alpine>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg">
                <div>
                    <span
                        x-data="{ isOn: false }"
                        @click="isOn = !isOn"
                        :aria-checked="isOn"
                        :class="{'bg-indigo-600': isOn, 'bg-gray-200': !isOn }"
                        class="bg-gray-200 relative inline-block flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:shadow-outline"
                        role="checkbox"
                        tabindex="0"
                    >
                        <span
                            aria-hidden="true"
                            :class="{'translate-x-5': isOn, 'translate-x-0': !isOn }"
                            class="translate-x-0 inline-block h-5 w-5 rounded-full bg-white shadow transform transition ease-in-out duration-200"
                        >
                        </span>
                    </span>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="1shadow-xl 1sm:rounded-lg">
                <div class="px-6 py-4">
                    <!--
                      This example requires Tailwind CSS v2.0+

                      This example requires some changes to your config:

                      ```
                      // tailwind.config.js
                      module.exports = {
                        // ...
                        plugins: [
                          // ...
                          require('@tailwindcss/forms'),
                        ]
                      }
                      ```
                    -->
                    <div>
                        <div class="md:grid md:grid-cols-3 md:gap-6">
                            <div class="md:col-span-1">
                                <div class="px-4 sm:px-0">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Profile</h3>
                                    <p class="mt-1 text-sm text-gray-600">
                                        This information will be displayed publicly so be careful what you share.
                                    </p>
                                </div>
                            </div>
                            <div class="mt-5 md:mt-0 md:col-span-2">
                                <form action="#" method="POST">
                                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                            <div class="grid grid-cols-3 gap-6">
                                                <div class="col-span-3 sm:col-span-2">
                                                    <label for="company_website"
                                                           class="block text-sm font-medium text-gray-700">
                                                        Website
                                                    </label>
                                                    <div class="mt-1 flex rounded-md shadow-sm">
                                                          <span
                                                              class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                                            http://
                                                          </span>
                                                        <input type="text" name="company_website" id="company_website"
                                                               class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                                               placeholder="www.example.com">
                                                    </div>
                                                </div>
                                            </div>

                                            <div>
                                                <label for="about" class="block text-sm font-medium text-gray-700">
                                                    About
                                                </label>
                                                <div class="mt-1">
                                                    <textarea id="about" name="about" rows="3"
                                                              class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"
                                                              placeholder="you@example.com"></textarea>
                                                </div>
                                                <p class="mt-2 text-sm text-gray-500">
                                                    Brief description for your profile. URLs are hyperlinked.
                                                </p>
                                            </div>

                                            <div>
                                                <label class="block text-sm font-medium text-gray-700">
                                                    Photo
                                                </label>
                                                <div class="mt-1 flex items-center">
                <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                  <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z"/>
                  </svg>
                </span>
                                                    <button type="button"
                                                            class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                        Change
                                                    </button>
                                                </div>
                                            </div>

                                            <div>
                                                <label class="block text-sm font-medium text-gray-700">
                                                    Cover photo
                                                </label>
                                                <div
                                                    class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                                    <div class="space-y-1 text-center">
                                                        <svg class="mx-auto h-12 w-12 text-gray-400"
                                                             stroke="currentColor" fill="none" viewBox="0 0 48 48"
                                                             aria-hidden="true">
                                                            <path
                                                                d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                                stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round"/>
                                                        </svg>
                                                        <div class="flex text-sm text-gray-600">
                                                            <label for="file-upload"
                                                                   class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                                <span>Upload a file</span>
                                                                <input id="file-upload" name="file-upload" type="file"
                                                                       class="sr-only">
                                                            </label>
                                                            <p class="pl-1">or drag and drop</p>
                                                        </div>
                                                        <p class="text-xs text-gray-500">
                                                            PNG, JPG, GIF up to 10MB
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                            <button type="submit"
                                                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                Save
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="hidden sm:block" aria-hidden="true">
                        <div class="py-5">
                            <div class="border-t border-gray-200"></div>
                        </div>
                    </div>

                    <div class="mt-10 sm:mt-0">
                        <div class="md:grid md:grid-cols-3 md:gap-6">
                            <div class="md:col-span-1">
                                <div class="px-4 sm:px-0">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Personal Information</h3>
                                    <p class="mt-1 text-sm text-gray-600">
                                        Use a permanent address where you can receive mail.
                                    </p>
                                </div>
                            </div>
                            <div class="mt-5 md:mt-0 md:col-span-2">
                                <form action="#" method="POST">
                                    <div class="shadow overflow-hidden sm:rounded-md">
                                        <div class="px-4 py-5 bg-white sm:p-6">
                                            <div class="grid grid-cols-6 gap-6">
                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="first_name"
                                                           class="block text-sm font-medium text-gray-700">First
                                                        name</label>
                                                    <input type="text" name="first_name" id="first_name"
                                                           autocomplete="given-name"
                                                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                </div>

                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="last_name"
                                                           class="block text-sm font-medium text-gray-700">Last
                                                        name</label>
                                                    <input type="text" name="last_name" id="last_name"
                                                           autocomplete="family-name"
                                                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                </div>

                                                <div class="col-span-6 sm:col-span-4">
                                                    <label for="email_address"
                                                           class="block text-sm font-medium text-gray-700">Email
                                                        address</label>
                                                    <input type="text" name="email_address" id="email_address"
                                                           autocomplete="email"
                                                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                </div>

                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="country"
                                                           class="block text-sm font-medium text-gray-700">Country /
                                                        Region</label>
                                                    <select id="country" name="country" autocomplete="country"
                                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                        <option>United States</option>
                                                        <option>Canada</option>
                                                        <option>Mexico</option>
                                                    </select>
                                                </div>

                                                <div class="col-span-6">
                                                    <label for="street_address"
                                                           class="block text-sm font-medium text-gray-700">Street
                                                        address</label>
                                                    <input type="text" name="street_address" id="street_address"
                                                           autocomplete="street-address"
                                                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                </div>

                                                <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                                    <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                                                    <input type="text" name="city" id="city"
                                                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                </div>

                                                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                                    <label for="state" class="block text-sm font-medium text-gray-700">State
                                                        / Province</label>
                                                    <input type="text" name="state" id="state"
                                                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                </div>

                                                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                                    <label for="postal_code"
                                                           class="block text-sm font-medium text-gray-700">ZIP /
                                                        Postal</label>
                                                    <input type="text" name="postal_code" id="postal_code"
                                                           autocomplete="postal-code"
                                                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                            <button type="submit"
                                                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                Save
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="hidden sm:block" aria-hidden="true">
                        <div class="py-5">
                            <div class="border-t border-gray-200"></div>
                        </div>
                    </div>

                    <div class="mt-10 sm:mt-0">
                        <div class="md:grid md:grid-cols-3 md:gap-6">
                            <div class="md:col-span-1">
                                <div class="px-4 sm:px-0">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Notifications</h3>
                                    <p class="mt-1 text-sm text-gray-600">
                                        Decide which communications you'd like to receive and how.
                                    </p>
                                </div>
                            </div>
                            <div class="mt-5 md:mt-0 md:col-span-2">
                                <form action="#" method="POST">
                                    <div class="shadow overflow-hidden sm:rounded-md">
                                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                            <fieldset>
                                                <legend class="text-base font-medium text-gray-900">By Email</legend>
                                                <div class="mt-4 space-y-4">
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="comments" name="comments" type="checkbox"
                                                                   class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="comments" class="font-medium text-gray-700">Comments</label>
                                                            <p class="text-gray-500">Get notified when someones posts a
                                                                comment on a posting.</p>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="candidates" name="candidates" type="checkbox"
                                                                   class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="candidates" class="font-medium text-gray-700">Candidates</label>
                                                            <p class="text-gray-500">Get notified when a candidate
                                                                applies for a job.</p>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="offers" name="offers" type="checkbox"
                                                                   class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="offers"
                                                                   class="font-medium text-gray-700">Offers</label>
                                                            <p class="text-gray-500">Get notified when a candidate
                                                                accepts or rejects an offer.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div>
                                                    <legend class="text-base font-medium text-gray-900">Push
                                                        Notifications
                                                    </legend>
                                                    <p class="text-sm text-gray-500">These are delivered via SMS to your
                                                        mobile phone.</p>
                                                </div>
                                                <div class="mt-4 space-y-4">
                                                    <div class="flex items-center">
                                                        <input id="push_everything" name="push_notifications"
                                                               type="radio"
                                                               class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                                        <label for="push_everything"
                                                               class="ml-3 block text-sm font-medium text-gray-700">
                                                            Everything
                                                        </label>
                                                    </div>
                                                    <div class="flex items-center">
                                                        <input id="push_email" name="push_notifications" type="radio"
                                                               class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                                        <label for="push_email"
                                                               class="ml-3 block text-sm font-medium text-gray-700">
                                                            Same as email
                                                        </label>
                                                    </div>
                                                    <div class="flex items-center">
                                                        <input id="push_nothing" name="push_notifications" type="radio"
                                                               class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                                        <label for="push_nothing"
                                                               class="ml-3 block text-sm font-medium text-gray-700">
                                                            No push notifications
                                                        </label>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                            <button type="submit"
                                                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                Save
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
