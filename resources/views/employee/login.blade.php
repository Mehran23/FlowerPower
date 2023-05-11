<x-guest-layout>
<div class="container mx-auto max-w-lg">
        <h1 class="text-2xl font-bold mb-2">Medewerker Inloggen</h1>
        <form action="{{ route('employee.login') }}" class="bg-yellow-50 border border-black rounded-lg py-5 px-5" method="post">
            @csrf

            
            <!-- Email Address -->
            <div>
                <label for="email">E-mailadres:</label>
                <x-text-input id="email" class="bg-yellow-200 block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!--wachtwoord-->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
            <x-primary-button class="border mt-3">
                {{ __('Log in') }}
            </x-primary-button>
        </form>
    </div>
</x-guest-layout>
@include('footer')