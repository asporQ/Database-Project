<nav x-data="{ open: false }" class="bg-[#292827]  border-b border-gray-100  h-32">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 w-full">
            <!-- Logo -->
            <div class="shrink-0 flex items-center">
                <a href="{{ route('dashboard') }}">
                    <x-application-logo class=" h-14 w-auto fill-current text-gray-800 " />
                </a>
            </div>
            <div class="flex items-center gap-4">
                <!-- Navigation Links -->
                <!-- <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div> -->

                <!-- cart -->
                @auth
                <div class="hidden sm:flex sm:items-center sm:ms-6 ml-auto">
                    <a href="{{ route('cart.index') }}" class="text-white hover:text-[#F3B917]">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.6 8M17 13l1.6 8M9 21h6"></path>
                        </svg>
                    </a>
                </div>
                @endauth

                @guest
                <div class="hidden sm:flex sm:items-center sm:ms-6 ml-auto mr-auto">
                    <a href="{{ route('login') }}" class="text-white hover:text-[#F3B917]"
                        onclick="alert('Please login before proceeding to the login page.')">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.6 8M17 13l1.6 8M9 21h6"></path>
                        </svg>
                    </a>
                </div>
                @endguest

                <!-- Settings Dropdown -->
                @auth
                <div class="hidden sm:flex sm:items-center sm:ml-6 ml-auto">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-white focus:outline-none transition ease-in-out duration-150">
                                <div title="{{ Auth::user()->username }}">
                                    {{ strlen(Auth::user()->username) > 6 ? substr(Auth::user()->username, 0, 3) . '...'
                                    : Auth::user()->username }}
                                </div>
                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')" class="hover:bg-white">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="'/orders'" class="hover:bg-white">
                                {{ __('Order') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="'/products/manage'" class="hover:bg-white">
                                {{ __('Manage product') }}
                            </x-dropdown-link>
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" class="hover:bg-white"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
                @endauth

                @guest
                <div class="hidden sm:flex sm:items-center sm:ml-6 ml-auto text-white">
                    <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                        {{ __('Login') }}
                    </x-nav-link>
                </div>
                @endguest

                <!-- Hamburger -->
                <div class="-me-2 flex items-center sm:hidden">
                    <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400  hover:text-gray-500  hover:bg-gray-100  focus:outline-none focus:bg-gray-100  focus:text-gray-500  transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="border-t border-white w-full"></div>
        <div class="text-white">
            <div class="flex justify-between">
                <div class="flex items gap-x-40 my-4">

                    <a href="{{ url('products') }}" class="text-white hover:text-[#F3B917]">PRODUCT</a>
                    <a class="ms-4 text-white hover:text-[#F3B917]">CATEGORY</a>
                    <a class="ms-4 text-white hover:text-[#F3B917]">SALES</a>

                </div>
                <a href="{{ url('contact') }}" class="me-2 text-white hover:text-[#F3B917] my-4">CONTACT</a>
            </div>

            <!-- Responsive Navigation Menu -->
            <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
                <div class="pt-2 pb-3 space-y-1">
                    <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-responsive-nav-link>
                </div>

                <!-- Responsive Settings Options -->
                @auth
                <div class="pt-4 pb-1 border-t border-gray-200">
                    <div class="px-4">
                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}
                        </div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                    <div class="mt-3 space-y-1">
                        <x-responsive-nav-link :href="route('profile.edit')" class="hover:bg-[#F3B917]">
                            {{ __('Profile') }}
                        </x-responsive-nav-link>
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-responsive-nav-link :href="route('logout')" class="hover:bg-[#F3B917]"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </form>
                    </div>
                </div>
                @endauth

                @guest
                <div class="pt-4 pb-1 border-t border-gray-200">
                    <div class="px-4">
                        <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('login')">
                            {{ __('Login') }}
                        </x-responsive-nav-link>
                    </div>
                </div>
                @endguest
            </div>
        </div>
    </div>
</nav>