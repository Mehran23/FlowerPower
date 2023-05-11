@extends('layouts.app')

@section('content')
    <div class="bg-yellow-100 container mx-auto">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-yellow-50  border border-black rounded-lg">
                        <h1 class="text-3xl font-semibold mb-4">{{ __('Lijst van medewerkers') }}</h1>
                        <table class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Naam</th>
                                    <th class="px-4 py-2">E-mail</th>
                                    <th class="px-4 py-2">Functies</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $employee)
                                    <tr>
                                        <td class="border border-black px-4 py-2">{{ $employee->name }}</td>
                                        <td class="border border-black px-4 py-2">{{ $employee->email }}</td>
                                        <td class="border border-black px-4 py-2 flex justify-between">
                                            <a href="{{ route('employee.edit', $employee->id) }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Bewerken</a>
                                            <form action="{{ route('employee.destroy', $employee->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Weet je zeker dat je deze medewerker wilt verwijderen?')">Verwijderen</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('employee.create') }}" class="mt-10 inline-block items-center justify-center rounded-md border border-black rounded-lg bg-yellow-200 py-2 px-4 text-base font-medium text-black hover:bg-black hover:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Medewerker toevoegen</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-yellow-100 container mx-auto mt-8">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-yellow-50  border border-black rounded-lg">
                        <h1 class="text-3xl font-semibold mb-4">{{ __('Lijst van bestellingen') }}</h1>
                        <table class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Factuurnummer</th>
                                    <th class="px-4 py-2">Klantnaam</th>
                                    <th class="px-4 py-2">Totaalbedrag</th>
                                    <th class="px-4 py-2">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td class="border border-black px-4 py-2">{{ $order->id }}</td>
                                        <td class="border border-black px-4 py-2">{{ $order->user->first_name }}</td>
                                        <td class="border border-black px-4 py-2">
                                        @php
                                                $totalAmount = 0;
                                                foreach ($order->products as $product) {
                                                    $totalAmount += $product->price * $product->pivot->quantity;
                                                }
                                            @endphp
                                            €{{ $totalAmount }}
                                        </td>
                                        <td class="border border-black px-4 py-2 @if ($order->status == 'open') bg-green-500 @else bg-red-500 @endif">{{ $order->status }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

