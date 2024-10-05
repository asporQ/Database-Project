<nav x-data="{ open: false }" class="bg-[#292827] border-b border-gray-100 h-16 shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center h-full">
        <!-- Logo -->
        <div class="shrink-0 flex items-center">
            <a href="{{ route('dashboard') }}">
                <x-application-logo class="h-12 w-12 fill-current text-gray-800" />
            </a>
        </div>

        <!-- Navigation Links -->
        <div class="hidden sm:flex sm:items-center sm:gap-8 gap-8 font-semibold font-smooth">
            @foreach (['products' => 'PRODUCT', 'categories' => 'CATEGORY', 'story' => 'STORY', 'contact' => 'CONTACT'] as $url => $label)
                <a href="{{ url($url) }}" class="text-white hover:text-[#F3B917]">{{ $label }}</a>
            @endforeach
        </div>
        
        <!-- Mobile Navigation Links -->
        <div class="sm:hidden">
            <x-dropdown align="left" width="48">
                <x-slot name="trigger">
                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-[#292827] hover:bg-[#292827] focus:outline-none transition ease-in-out duration-150">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18M3 12h18M3 21h18"></path>
                        </svg>
                    </button>
                </x-slot>
                <x-slot name="content">
                    @foreach (['products' => 'PRODUCT', 'categories' => 'CATEGORY', 'sales' => 'SALES', 'contact' => 'CONTACT'] as $url => $label)
                        <x-dropdown-link :href="url($url)" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            {{ __($label) }}
                        </x-dropdown-link>
                    @endforeach
                </x-slot>
            </x-dropdown>
        </div>

        <!-- User Links -->
        <div class="flex items-center gap-4">
            @auth
                <a href="{{ route('cart.index') }}" class="text-white hover:text-[#F3B917]">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.6 8M17 13l1.6 8M9 21h6"></path>
                    </svg>
                </a>
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-white focus:outline-none transition ease-in-out duration-150">
                            <div title="{{ Auth::user()->username }}">
                                {{ strlen(Auth::user()->username) > 6 ? substr(Auth::user()->username, 0, 3) . '...' : Auth::user()->username }}
                            </div>
                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                    <x-slot name="content" class="bg-white">
                        <x-dropdown-link :href="route('profile.edit')" class="hover:bg-white">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <x-dropdown-link :href="'/orders'" class="hover:bg-white">
                            {{ __('Order') }}
                        </x-dropdown-link>
                        @if(Auth::user()->status =='admin')
                            <x-dropdown-link :href="'/products/manage'" class="hover:bg-white">
                                {{ __('Manage product') }}
                            </x-dropdown-link>
                        @endif
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" class="hover:bg-white" onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            @endauth

            @guest
                <a href="{{ route('login') }}" class="text-white hover:text-[#F3B917]">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.6 8M17 13l1.6 8M9 21h6"></path>
                    </svg>
                </a>
                <a href="{{ route('login') }}" class="text-white hover:text-[#F3B917]">
                    {{ __('Login') }}
                </a>
            @endguest
        </div>

        <!-- Hamburger -->
        <div class="sm:hidden">
            <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
</nav>
