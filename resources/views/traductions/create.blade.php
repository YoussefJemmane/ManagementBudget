<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __("Create Un Demande de Traduction") }}
        </h2>
    </x-slot>

    <div class="flex justify-center py-12 ">
        <div class="border  bg-white p-[20px]  w-[400px]">
            <form method="POST" action="{{ route('formulairetraduction.store') }}">
                @csrf


                <div class="flex items-center justify-end mt-4">


                    <button class="ms-4" href="{{ route('formulairetraduction.index') }}"  class="w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                        {{ __('Annuler') }}
                    </button>
                    <button class="ms-4">
                        {{ __('Submit') }}
                    </button>
                </div>
            </form>

        </div>


    </div>
</x-app-layout>
