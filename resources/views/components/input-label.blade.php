@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-m text-black']) }}>
    {{ $value ?? $slot }}
</label>
