<x-jet-authentication-card>
    <x-slot name="logo">
        <x-jet-authentication-card-logo />
    </x-slot>

    <x-jet-validation-errors class="mb-4" />

    <form method="POST" wire:submit.prevent="save">
        @csrf

        <div>
            <div class="w-full flex items-center rounded-lg overflow-hidden">
                <div class="group">
                    <label class="check-label text-sm w-1/2 py-4 px-6 bg-gray-100" for="type-patient">
                        <input wire:model="state.type" type="radio" class="form-check" value="patient" name="type" id="type-patient">
                        {{ __('Register as a patient') }}
                    </label>
                </div>
                <div class="group">
                    <label class="check-label text-sm w-1/2 py-4 px-6 bg-gray-100 " for="type-doctor">
                        <input wire:model="state.type" type="radio" class="form-check" value="doctor" name="type" id="type-doctor">
                        {{ __('Register as a doctor') }}
                    </label>
                </div>
            </div>
        </div>

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

            <x-jet-button class="ml-4">
                {{ __('Register') }}
            </x-jet-button>
        </div>
    </form>
</x-jet-authentication-card>
