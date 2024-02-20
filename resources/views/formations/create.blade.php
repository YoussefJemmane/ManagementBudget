<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __("Create Un Formation") }}
        </h2>
    </x-slot>

    <div class="flex justify-center py-12 ">
        <div class="border rounded-md bg-white p-[20px]  w-[400px]">
            <form method="POST" action="{{ route('formulaireformation.store') }}" class="max-w-md pt-4 mx-auto">
                @csrf

                <!-- Numero des jours -->
                <div class="relative z-0 w-full mb-5 group">
                    <x-input-label for="num_jour" :value="__('Numero des jours')" />
                    <x-text-input id="num_jour" class="block w-full mt-1" type="number" name="num_jour" :value="old('num_jour')" required autofocus autocomplete="num_jour" />
                    <x-input-error :messages="$errors->get('num_jour')" class="mt-2" />
                </div>
                <!-- Numero des personnes -->
                <div class="mt-4">
                    <x-input-label for="num_person" :value="__('Numero des personnes')" />
                    <x-text-input id="num_person" class="block w-full mt-1" type="number" name="num_person" :value="old('num_person')" required autofocus autocomplete="num_person" />
                    <x-input-error :messages="$errors->get('num_person')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">


                    <x-link-button class="ms-4" href="{{ route('formulaireformation.index') }}">
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
