<x-app-layout>
    <div class="flex justify-center">
        <div class="w-full px-6 py-4 mt-6 overflow-hidden bg-white shadow-md sm:max-w-md sm:rounded-lg ">
            <x-slot name="header">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    {{ __('Creer Un Utilisateurs') }}
                </h2>
            </x-slot>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- CIN -->
                <div class="mt-4">
                    <x-input-label for="cin" :value="__('CIN')" />
                    <x-text-input id="cin" class="block mt-1 w-full" type="text" name="cin" :value="old('cin')" required autofocus autocomplete="cin" />
                    <x-input-error :messages="$errors->get('cin')" class="mt-2" />
                </div>
                <!-- Phone -->
                <div class="mt-4">
                    <x-input-label for="phone" :value="__('Phone')" />
                    <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus autocomplete="phone" />
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>

                <!-- Role -->
                <div class="mt-4">
                    <x-input-label for="role" :value="__('Role')" />
                    <select name="role" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" {{ $disabled ? 'disabled' : '' }}>
                        <option value="">Choisir un rôle</option>
                        @foreach ($options as $option)
                        <option value="{{ $option['role'] }}">{{ $option['role'] }}</option>
                        @endforeach
                    </select>

                    <x-input-error :messages="$errors->get('role')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ms-4">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>

    </div>
</x-app-layout>
