<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-yellow-200 border border-black rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-black hover:text-white focus:bg-black active:bg-black focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
