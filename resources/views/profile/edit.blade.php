<x-guest-layout>
    <form method="POST" class="mx-auto max-w-lg bg-yellow-50 border border-black rounded-lg py-5 px-5" action="{{ route('profile.update') }}">
    @csrf

    <div class="grid grid-cols-2 gap-4">
        <!-- First Name -->
        <div>
        <x-input-label for="first_name" :value="__('First Name')" />
        <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" value="{{ $user-> first_name}}" required autofocus autocomplete="given-name" />
        <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
        </div>

        <!-- Infix -->
        <div>
        <x-input-label for="infix" :value="__('Infix')" />
        <x-text-input id="infix" class="block mt-1 w-full" type="text" name="infix" value="{{ $user->infix }}" autocomplete="additional-name" />
        <x-input-error :messages="$errors->get('infix')" class="mt-2" />
        </div>

        <!-- Last Name -->
        <div>
        <x-input-label for="last_name" :value="__('Last Name')" />
        <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" value="{{ $user->last_name }}" required autocomplete="family-name" />
        <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
        </div>

        <!-- Street -->
        <div>
        <x-input-label for="street" :value="__('Street')" />
        <x-text-input id="street" class="block mt-1 w-full" type="text" name="street" value="{{ $user->street }}" required autocomplete="street-address" />
        <x-input-error :messages="$errors->get('street')" class="mt-2" />
        </div>

        <!-- House Number -->
        <div>
        <x-input-label for="housenumber" :value="__('House Number')" />
        <x-text-input id="housenumber" class="block mt-1 w-full" type="text" name="housenumber" value="{{ $user->housenumber }}" required autocomplete="address-line2" />
        <x-input-error :messages="$errors->get('housenumber')" class="mt-2" />
        </div>

        <!-- Postal Code -->
        <div>
        <x-input-label for="postal_code" :value="__('Postal Code')" />
        <x-text-input id="postal_code" class="block mt-1 w-full" type="text" name="postal_code" value="{{ $user->postal_code }}" required autocomplete="postal-code" />
        <x-input-error :messages="$errors->get('postal_code')" class="mt-2" />
        </div>

        <!-- City -->
        <div>
        <x-input-label for="city" :value="__('City')" />
        <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" value="{{ $user->city }}" required autocomplete="address-level2" />
        <x-input-error :messages="$errors->get('city')" class="mt-2" />
        </div>

        <!-- phone number -->
        <div>
            <x-input-label for="phone_number" :value="__('Phone number')" />
            <x-text-input id="phone_number" class="w-full" type="tel" name="phone_number" value="{{ $user->phone_number }}" required autocomplete="tel" />
            <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="w-full" type="email" name="email" value="{{ $user->email }}" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="w-full" type="password" name="password" pattern=".{8,}" title="Breid deze tekst uit tot 8 tekens of meer." autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="w-full" type="password" name="password_confirmation" pattern=".{8,}" title="Breid deze tekst uit tot 8 tekens of meer." autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
    </div>

    <div class="flex items-center justify-end mt-4">
        <x-primary-button class="ml-4">
            {{ __('Opslaan') }}
        </x-primary-button>
    </div>
</x-guest-layout>
@include('footer')
