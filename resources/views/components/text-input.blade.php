@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'bg-yellow-200 border-black focus:border-black focus:ring-black rounded-md shadow-sm']) !!}>
