<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __("Create Un Etudiant") }}
        </h2>
    </x-slot>

    <div class="py-12 flex justify-center ">
        <div class="border rounded-md bg-white p-[20px]  w-[400px]">
            <form method="POST" action="{{ route('student.store') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <!-- Phone -->
                <div class="mt-4">
                    <x-input-label for="phone" :value="__('Phone')" />
                    <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autocomplete="phone" />
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>


                <!-- CIN -->
                <div class="mt-4" id="cin">
                    <x-input-label for="cin" :value="__('CIN')" />
                    <x-text-input type="text" name="cin" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
                    <x-input-error :messages="$errors->get('cin')" class="mt-2" />
                </div>
                <!-- CNE -->
                <div class="mt-4" id="cne">
                    <x-input-label for="cne" :value="__('CNE')" />
                    <x-text-input type="text" name="cne" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
                    <x-input-error :messages="$errors->get('cne')" class="mt-2" />
                </div>
                <!-- Date Inscription -->
                <div class="mt-4" id="date_inscription">
                    <x-input-label for="date_inscription" :value="__('Date Inscription')" />
                    <x-text-input type="date" name="date_inscription" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
                    <x-input-error :messages="$errors->get('date_inscription')" class="mt-2" />
                </div>
                <!-- Ettablisement -->
                <div class="mt-4" id="ettablisement">
                    <x-input-label for="ettablisement" :value="__('Ettablisement')" />
                    <x-text-input type="text" name="ettablisement" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
                    <x-input-error :messages="$errors->get('ettablisement')" class="mt-2" />
                </div>
                <!-- Encadrant -->
                <div class="mt-4" id="enseignant">
                    <x-input-label for="enseignant" :value="__('Enseignant')" />
                    <select name="enseignant_id" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        @foreach ($enseignants as $enseignant)
                        <option value="{{ $enseignant->id }}">{{ $enseignant->user->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('enseignant')" class="mt-2" />
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


                    <x-link-button class="ms-4" href="{{ route('student.index') }}">
                        {{ __('Annuler') }}
                    </x-link-button>
                    <x-primary-button class="ms-4">
                        {{ __('Submit') }}
                    </x-primary-button>
                </div>
            </form>

        </div>


    </div>
</x-app-layout>
