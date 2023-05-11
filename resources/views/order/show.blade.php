@extends('layouts.app')

@section('content')
    <div class="bg-yellow-100 container mx-auto">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-yellow-50  border border-black rounded-lg">
                        <h1 class="text-3xl font-semibold mb-4">{{ __('Winkelwagen') }}</h1>
                        @if($order)
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
                                            <td class="border border-black px-4 py-2 font-semibold text-green-500">€{{ $product->price  * $product->pivot->quantity }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="flex justify-between items-center">
                                <a href="{{ route('order.delete', ['order' => $order->id]) }}" class="mt-10 inline-block items-center justify-center rounded-md border border-black rounded-lg bg-yellow-200 py-2 px-4 text-base font-medium text-black hover:bg-black hover:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Winkelwagen verwijderen</a>
                                <a href="{{ route('order.order', ['order' => $order->id]) }}" class="mt-10 inline-block items-center justify-center rounded-md border border-black rounded-lg bg-yellow-200 py-2 px-4 text-base font-medium text-black hover:bg-black hover:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Bestellen</a>
                                <p class="text-lg font-semibold ml-4">Totaal: €{{ $total }}</p>
                            </div>
                        @else
                            U heeft nog geen producten in uw winkelwagen.
                        @endif
                    </div>  
                </div>
            </div>
        </div>
    </div>
@endsection
