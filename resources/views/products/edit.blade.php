@extends('layouts.app')

@section('content')
    <div class="bg-yellow-100 h-screen flex item-center">
        <div class="bg-yellow-50 mx-auto my-8 px-10 py-16 border border-black rounded-lg">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Product Bewerken</h1>

            <div class="mt-6">
                <form method="POST" action="{{ route('employee.products.edit', ['product' => $product->id]) }}">
                    @csrf

                    <div class="mb-4">
                        <label for="name" class="block font-medium text-gray-700">Naam</label>
                        <input type="text" name="name" id="name" value="{{ $product->name }}" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block font-medium text-gray-700">Beschrijving</label>
                        <textarea name="description" id="description"  class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>{{ $product->description }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="price" class="block font-medium text-gray-700">Prijs</label>
                        <input type="number" name="price" id="price" value="{{ $product->price }}" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                    </div>

                    <div class="flex items-center justify-end mt-3">
                        <button type="submit" class="mt-10 flex w-auto items-center justify-center rounded-md border border-transparent bg-yellow-200 py-2 px-4 text-base font-medium text-black hover:bg-black hover:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection