<nav class="bg-yellow-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <a href="{{ route('home') }}" class="text-black text-2xl font-bold">Flowerpower</a>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="{{ route('home') }}" class="text-black hover:bg-white hover:text-black px-3 py-2 rounded-md text-sm font-medium">Home</a>
                        <a href="{{ route('products.index') }}" class="text-black hover:bg-white hover:text-black px-3 py-2 rounded-md text-sm font-medium">Producten</a>                 
                        <a href="{{ route('contact') }}" class="text-black hover:bg-white hover:text-black px-3 py-2 rounded-md text-sm font-medium">Contact</a>
                        @if(Auth::guard('employee')->check())
                        <a href="{{ route('employee.index') }}" class="text-black hover:bg-white hover:text-black px-3 py-2 rounded-md text-sm font-medium">Medewerkers</a>
                        @endif
                        <!-- add more links here as needed -->
                    </div>
                </div>
            </div>
            <div class="flex items-center">
                @auth
                <a href="{{ route('order.show') }}" class="text-black hover:bg-white hover:text-black px-3 py-2 rounded-md text-sm font-medium">Winkelwagen</a>
                @endauth
                @if (Auth::guard('web')->check() || Auth::guard('employee')->check())
                    <!-- Settings Dropdown -->
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="inline-flex items-center px-3 py-2 border border-black text-sm leading-4 font-medium rounded-md text-black bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                    <div>{{ Auth::guard('web')->check() ? Auth::user()->first_name : Auth::guard('employee')->user()->name }}</div>

                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                            @if (Auth::guard('employee')->check())
    <!-- <x-dropdown-link :href="route('employee.profile.edit')">
        {{ __('Profile') }}
    </x-dropdown-link> -->
@else
    <!-- <x-dropdown-link :href="route('profile.edit')">
        {{ __('Profile') }}
    </x-dropdown-link> -->
@endif

                                <!-- Authentication -->
                                <form method="POST" action="{{ Auth::guard('web')->check() ? route('logout') : route('employee.logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="Auth::guard('web')->check() ? route('logout') : route('employee.logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @else
                    <a class="text-black hover:bg-white hover:text-black px-3 py-2 rounded-md text-sm font-medium" href="{{ route('login') }}">{{ __('Login') }}</a>
@if (Route::has('register'))
<a class="text-black hover:bg-white hover:text-black px-3 py-2 rounded-md text-sm font-medium" href="{{ route('register') }}">{{ __('Register') }}</a>
@endif
<a class="text-black hover:bg-white hover:text-black px-3 py-2 rounded-md text-sm font-medium" href="{{ route('employee.login') }}">Medewerker Login</a>
@endif
</div>
</div>
</div>

</div>
<!-- Responsive Navigation Menu -->
<div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
    <div class="pt-2 pb-3 space-y-1">
        <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            {{ __('Dashboard') }}
        </x-responsive-nav-link>
    </div>
    <!-- Responsive Settings Options -->
<div class="pt-4 pb-1 border-t border-gray-200">
    @if (Auth::guard('web')->check() || Auth::guard('employee')->check())
        <div class="px-4">
            <div class="font-medium text-base text-gray-800">{{ Auth::guard('web')->check() ? Auth::user()->first_name : Auth::guard('employee')->user()->name }}</div>
            <div class="font-medium text-sm text-gray-500">{{ Auth::guard('web')->check() ? Auth::user()->email : Auth::guard('employee')->user()->email }}</div>
        </div>

        <div class="mt-3 space-y-1">
            <!-- <x-responsive-nav-link :href="route('profile.edit')">
                {{ __('Profile') }}
            </x-responsive-nav-link> -->

            <!-- Authentication -->
            <form method="POST" action="{{ Auth::guard('web')->check() ? route('logout') : route('employee.logout') }}">
                @csrf
                <x-responsive-nav-link :href="Auth::guard('web')->check() ? route('logout') : route('employee.logout')"
                    onclick="event.preventDefault();
                    this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-responsive-nav-link>
            </form>
        </div>
    @endif
</div>
</div>
</nav>


