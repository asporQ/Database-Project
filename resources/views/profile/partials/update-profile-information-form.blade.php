<section>
    <header>
        <h2 class="text-3xl font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <form id="send-verification" method="post" action="{{ route('profile.verification') }}">
            @csrf
            @method('post')

            @if ($user->profile_verified_at === null)
            <div class="flex items-center gap-2">
                <x-primary-button class="text-xl">{{ __('Verify Profile') }}</x-primary-button>
            </div>
            @else
            <div class="mt-2 text-xl text-green-600 dark:text-green-400">
                Verified Account.
            </div>
            @endif
        </form>

        <p class="mt-1 text-xl text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>





    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label class="text-xl" for="username" :value="__('Username')" />
            <x-text-input id="username" name="username" type="text" class="mt-1 block w-full text-xl"
                :value="old('username', $user->username)" required autofocus autocomplete="username" />
            <x-input-error class="mt-2 text-xl" :messages="$errors->get('username')" />
        </div>

        <div>
            <x-input-label class="text-xl" for="first_name" :value="__('First Name')" />
            <x-text-input id="first_name" name="first_name" type="text" class="mt-1 block w-full text-xl"
                :value="old('first_name', $user->first_name)" required autofocus />
            <x-input-error class="mt-2 text-xl" :messages="$errors->get('first_name')" />
        </div>

        <div>
            <x-input-label class="text-xl" for="last_name" :value="__('Last Name')" />
            <x-text-input id="last_name" name="last_name" type="text" class="mt-1 block w-full text-xl"
                :value="old('last_name', $user->last_name)" required />
            <x-input-error class="mt-2 text-xl" :messages="$errors->get('last_name')" />
        </div>

        <div>
            <x-input-label class="text-xl" for="birthdate" :value="__('Birthdate')" />
            <x-text-input id="birthdate" name="birthdate" type="date" class="mt-1 block w-full text-xl"
                :value="old('birthdate', $user->birthdate)" required />
            <x-input-error class="mt-2 text-xl" :messages="$errors->get('birthdate')" />
        </div>

        <div>
            <x-input-label class="text-xl" for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full text-xl"
                :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <div>
            <x-input-label class="text-xl" for="phone_number" :value="__('Phone Number')" />
            <x-text-input id="phone_number" name="phone_number" type="tel" class="mt-1 block w-full text-xl"
                :value="old('phone_number', $user->phone_number)" required autocomplete="phone_number" />
            <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
        </div>

        <div class="flex items-center gap-2 ">
            <x-primary-button class="text-xl">{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
            @endif
        </div>


    </form>

</section>