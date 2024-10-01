<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black font-inter text-4xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('PRODUCTS') }}
        </h2>
    </x-slot>
    <style>
    select {

        outline: none;
        border: none;
    }
    </style>
    <!-- dropdown filters -->
    <div class=" py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class=" font-bold font-inter text-4xl"> FILTER</h2>
            <div x-data="{ open: false }" class="relative inline-block text-left">
                <div>
                    <button @click="open = !open" type="button"
                        class="inline-flex justify-center w-full px-4 py-2 bg-[#FCF7EC] text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        id="options-menu" aria-expanded="true" aria-haspopup="true">
                        % Alcohol
                        <svg :class="{'transform rotate-180': open}"
                            class="-mr-1 ml-2 h-5 w-5 transition-transform duration-200"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
                <div x-show="open" @click.away="open = false"
                    class="origin-top-right absolute right-0 mt-2 w-56 rounded-md bg-none " role="menu"
                    aria-labelledby="options-menu">
                    <div class="py-1 pl-40 w-fit " role="none">
                        @foreach (['< 5%', '5-10%' , '> 10%' ] as $option) <a href="#"
                            class="block px-2 py-2 text-sm text-gray-700 hover:bg-gray-100 w-fit cursor-auto"
                            role="menuitem">
                            {{ $option }}</a>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class=" py-24">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>