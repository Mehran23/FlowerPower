@extends('layouts.app')

@section('content')
<div class="bg-yellow-100">
    <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 sm:py-24 lg:px-8">
        <div class="lg:grid lg:grid-cols-2 lg:gap-8">
            <div class="h-64 w-full aspect-w-1 aspect-h-1 overflow-hidden rounded-md bg-gray-200 lg:aspect-w-4 lg:aspect-h-3 lg:h-auto">
                <img src="https://i0.wp.com/www.uwbloemenman.nl/wp-content/uploads/2020/07/UWB-Boeket-Christel.jpg?fit=1000%2C1000&ssl=1" alt="{{ $product->name }}" class="h-full w-full object-cover object-center">
            </div>
            <div class="mt-8 lg:mt-0 lg:ml-8">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900">{{ $product->name }}</h2>
                <p class="mt-4 text-sm text-gray-500">{{ $product->description }}</p>
                <div class="mt-6">
                    <p class="text-2xl font-semibold text-green-500">€{{ $product->price }}</p>
                    @auth
                    <form method="POST" action="{{ route('order.add') }}">
                        @csrf
                        <input hidden type="number" name="product_id" value="{{ $product->id }}">
                        <input type="number" name="quantity" value=1>
                        <button type="submit" class="mt-10 flex w-auto items-center justify-center rounded-md border border-transparent bg-yellow-200 py-2 px-4 text-base font-medium text-black hover:bg-black hover:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Voeg toe aan winkelmandje</button>
                    </form>
                    @endauth
                    @if(Auth::guard('employee')->check())
                    <div class="my-4">
                    <a href="{{ route('employee.products.edit', ['product' => $product->id]) }}" class="mt-10 flex w-auto items-center justify-center rounded-md border border-transparent bg-yellow-200 py-2 px-4 text-base font-medium text-black hover:bg-black hover:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2   ">Product bewerken</a>
                    </div>
                    <div class="my-4">
                    <a href="{{ route('employee.products.destroy', ['product' => $product->id]) }}" class="mt-10 flex w-auto items-center justify-center rounded-md border border-transparent bg-yellow-200 py-2 px-4 text-base font-medium text-black hover:bg-black hover:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2   ">Product verwijderen</a>
                    </div>
                    @endif
            </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection