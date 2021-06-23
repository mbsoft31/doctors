<x-guest-layout>
    <div class="flex flex-col sm:justify-center items-center pt-6 pb-20 sm:py-6 bg-gray-100">

        <div class="w-full max-w-lg flex flex-col items-center mt-6 px-6 py-4 space-y-4">
            <x-jet-authentication-card-logo />
            <div class="w-full px-4 py-4 text-center text-gray-800 rounded-md">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid enim hic incidunt labore officia quam quia rem saepe totam velit!
            </div>
        </div>

        <div class="w-full flex flex-wrap md:flex-nowrap md:justify-around">
            <div class="w-full md:max-w-md my-auto px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <div class="py-6 px-6 space-y-8">
                    <p class="text-2xl text-center font-semibold tracking-wide font-gray-800">
                        {{ __("Already have an account ?") }}
                    </p>
                    <div>
                        <a href="{{ route("login") }}" class="block px-6 py-2.5 text-lg text-center rounded-lg shadow bg-indigo-600 text-gray-50 hover:bg-indigo-700 focus:outline-none focus:ring-indigo-700 focus:ring-offset-2 focus:ring-2 focus:bg-indigo-700">
                            {{ __('Sign in to your account') }}
                        </a>
                    </div>
                </div>
            </div>
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

                <x-jet-validation-errors class="mb-4" />

                <form method="POST" action="{{ route("auth.patient.register") }}" wire:submit.prevent="register">
                    @csrf

                    <div>
                        <x-jet-label for="name" value="{{ __('Name') }}" />
                        <x-jet-input wire:model="state.name" id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="email" value="{{ __('Email') }}" />
                        <x-jet-input wire:model="state.email" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="phone" value="{{ __('Phone') }}" />
                        <x-jet-input wire:model="state.phone" id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="password" value="{{ __('Password') }}" />
                        <x-jet-input wire:model="state.password" id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                        <x-jet-input wire:model="state.password_confirmation" id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                    </div>

                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="mt-4">
                            <x-jet-label for="terms">
                                <div class="flex items-center">
                                    <x-jet-checkbox wire:model="state.terms" name="terms" id="terms"/>

                                    <div class="ml-2">
                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                        ]) !!}
                                    </div>
                                </div>
                            </x-jet-label>
                        </div>
                    @endif

                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <x-jet-button class="ml-4 bg-indigo-800 hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring focus:ring-indigo-300">
                            {{ __('Register') }}
                        </x-jet-button>
                    </div>
                </form>

            </div>
        </div>


    </div>

</x-guest-layout>
