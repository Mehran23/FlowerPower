@extends('layouts.app')

@section('content')
<div class="bg-yellow-100">
    <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-4 lg:max-w-7xl lg:px-8">
        <div class="flex justify-between items-center">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Producten</h1>
        
            @if(Auth::guard('employee')->check())
            <div class="my-4">
            <a href="{{ route('employee.products.create') }}" class="mt-10 flex w-auto items-center justify-center rounded-md border border-black rounded-lg bg-yellow-200 py-2 px-4 text-base font-medium text-black hover:bg-black hover:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Product toevoegen</a>
            </div>
            @endif
            </div>
        

            <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                @foreach ($products as $product)
                <div class="border-2 border-black rounded-md group relative h-full">
                    <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden bg-black lg:aspect-none group-hover:opacity-75 lg:h-80 box-border border border-black">
                        <img src="https://i0.wp.com/www.uwbloemenman.nl/wp-content/uploads/2020/07/UWB-Boeket-Christel.jpg?fit=1000%2C1000&ssl=1" alt="{{ $product->name }}" class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                    </div>
                    <div class="px-4 py-2 flex justify-between shadow-xl hover:opacity-75 hover:shadow-lg h-80 bg-black border border-black">
                        <div>
                        <h2 class="text-2xl text-white">
                                <a href="{{ route('products.show', $product->id) }}">
                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                    {{ $product->name }}
                                </a>
                            </h2>
                            <p class="mt-4 text-l text-gray-300">{{ $product->description }}</p>
                        </div>
                        <p class="text-xl font-medium text-green-500">€{{ $product->price }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
 </div>
@endsection

