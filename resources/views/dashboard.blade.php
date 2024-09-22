<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black font-inter text-4xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('PRODUCT') }}
        </h2>
    </x-slot>

    <div>

        <div class="text-black px-[172px]">
            <form method="GET" action="{{ route('dashboard') }}">
                <div class="flex items-center">
                    <select name="filter_al" class="ml-2 px-4 py-2 rounded-md text-gray-800">
                        <option value="">AL</option>
                        <option value="al1">AL 1</option>
                        <option value="al2">AL 2</option>
                        <!-- Add more options as needed -->
                    </select>
                    <select name="filter_type" class="ml-2 px-4 py-2 rounded-md text-gray-800">
                        <option value="">Type</option>
                        <option value="type1">Type 1</option>
                        <option value="type2">Type 2</option>
                        <!-- Add more options as needed -->
                    </select>
                </div>
            </form>
        </div>
    </div>

    <div class=" py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>