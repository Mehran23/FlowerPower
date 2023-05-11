@extends('layouts.app')

@section('content')
    <div class="bg-yellow-100 container mx-auto">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-yellow-50  border border-black rounded-lg">
                        <h1 class="text-3xl font-semibold mb-4">{{ __('Bestelling') }} #{{ $order->id }}</h1>
                        <h2 class="text-3xl font-semibold mb-4">{{ $order->status }}</h1>
                        <table class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Product</th>
                                    <th class="px-4 py-2">Aantal</th>
                                    <th class="px-4 py-2">Prijs</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->products as $product)
                                    <tr>
                                        <td class="border border-black px-4 py-2">{{ $product->name }} - €{{ $product->price }}</td>
                                        <td class="border border-black px-4 py-2">{{ $product->pivot->quantity }}</td>
                                        <td class="border border-black px-4 py-2">€{{ $product->price  * $product->pivot->quantity }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td>Totaal: €{{ $total }}<td/>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Naam</th>
                                    <th class="px-4 py-2">Adres</th>
                                    <th class="px-4 py-2">Telefoonnummer</th>
                                    <th class="px-4 py-2">Email</th>
                                </tr>
                            </thead>
                            <tr>
                                <td class="border border-black px-4 py-2">{{ $user->first_name }} {{ $user->infix }} {{ $user->last_name }}</td>
                                <td class="border border-black px-4 py-2">{{ $user->street }} {{ $user->housenumber }}, {{ $user->postal_code }} {{ $user->city }}</td>
                                <td class="border border-black px-4 py-2">{{ $user->phone_number }}</td>
                                <td class="border border-black px-4 py-2">{{ $user->email }}</td>
                            </tr>
                        </table>
                        @if($order->status == 'closed')
                        <a href="{{ route('employee.order.open', ['order' => $order->id]) }}" class="mt-10 inline-block items-center justify-center rounded-md border border-black rounded-lg bg-yellow-200 py-2 px-4 text-base font-medium text-black hover:bg-black hover:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Bestelling open zetten</a>
                        @else
                        <a href="{{ route('employee.order.close', ['order' => $order->id]) }}" class="mt-10 inline-block items-center justify-center rounded-md border border-black rounded-lg bg-yellow-200 py-2 px-4 text-base font-medium text-black hover:bg-black hover:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Bestelling afronden</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
