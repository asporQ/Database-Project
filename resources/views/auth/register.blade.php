<x-guest-layout>
    <form action="{{ route('register') }}" method="POST">
        @csrf

        <!-- First Name -->
        <div>

            <x-input-label :value="__('First Name')" for="first_name" />
            <x-text-input :value="old('first_name')" autocomplete="given-name" autofocus class="block mt-1 w-full" id="first_name"
                name="first_name" required type="text" />
            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
        </div>

        <!-- Last Name -->
        <div class="mt-4">
            <x-input-label :value="__('Last Name')" for="last_name" />
            <x-text-input :value="old('last_name')" autocomplete="family-name" class="block mt-1 w-full" id="last_name"
                name="last_name" required type="text" />
            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
        </div>

        <!-- Username -->
        <div class="mt-4">
            <x-input-label :value="__('Username')" for="username" />
            <x-text-input :value="old('username')" class="block mt-1 w-full" id="username" name="username" required
                type="text" />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <!-- Birthdate -->
        <div class="mt-4">
            <x-input-label :value="__('Birthdate')" for="birthdate" />
            <x-text-input :value="old('birthdate')" class="block mt-1 w-full" id="birthdate" name="birthdate" required
                type="date" />
            <x-input-error :messages="$errors->get('birthdate')" class="mt-2" />
        </div>

        <!-- Phone Number -->
        <div class="mt-4">
            <x-input-label :value="__('Phone Number')" for="phone" />
            <x-text-input :value="old('phone')" class="block mt-1 w-full" id="phone" name="phone" required
                type="tel" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">

            <x-input-label :value="__('Email')" for="email" />
            <x-text-input :value="old('email')" autocomplete="username" class="block mt-1 w-full" id="email"
                name="email" required type="email" />

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Birth Date -->
        <div class="mt-4">
            <x-input-label for="birth_date" :value="__('Birth Date')" />
            <div class="flex space-x-2">
                <x-text-input id="birth_day" class="block mt-1 w-full" type="number" name="birth_day"
                    :value="old('birth_day')" required placeholder="DD" min="1" max="31" />
                <x-text-input id="birth_month" class="block mt-1 w-full" type="number" name="birth_month"
                    :value="old('birth_month')" required placeholder="MM" min="1" max="12" />
                <x-text-input id="birth_year" class="block mt-1 w-full" type="number" name="birth_year"
                    :value="old('birth_year')" required placeholder="YYYY" min="1900" max="{{ date('Y') }}" />
            </div>
            <x-input-error :messages="$errors->get('birth_date')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
        
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">

            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />


            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>