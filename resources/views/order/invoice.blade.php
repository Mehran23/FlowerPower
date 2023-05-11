@extends('layouts.app')

@section('content')
    <div class="bg-yellow-100 container mx-auto">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-yellow-50  border border-black rounded-lg">
                        <h1 class="text-3xl font-semibold mb-4">{{ __('Uw heeft het volgende besteld') }}</h1>
                        <h2 class="text-3xl font-semibold mb-4">#{{ $order->id }}</h1>
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
                                        <td><td/>
                                        <td>Totaal: €{{ $total }}<td/>
                                    </tr>
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
