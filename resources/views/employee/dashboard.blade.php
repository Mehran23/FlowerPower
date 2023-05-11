<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    

        <div class="border border-black rounded-lg py-12 bg-yellow-100 mx-auto max-w-lg">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-yellow-50 overflow-hidden shadow-sm sm:rounded-lg">
                <h1 class="p-6 font-semibold text-xl text-black text-center">
                 {{ __("Je bent ingelogd als een Medewerker!") }}
                </h1>
            </div>
        </div>
    </div>
    </x-slot>
</x-app-layout>
