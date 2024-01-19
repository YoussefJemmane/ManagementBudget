<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __("Your Account") }}
        </h2>
    </x-slot>

    <div class="flex justify-center py-12 ">
        <div class="border rounded-md bg-white p-[20px]">

            <div class="flex items-center ml-4">
                <h1 class="text-2xl font-bold text-gray-700">{{ $entreprise->user->name }}</h1>
            </div>
            <div>
                <p class="mt-2 text-sm text-gray-500">Email: {{ $entreprise->user->email }}</p>
                <p class="mt-2 text-sm text-gray-500">Phone: {{ $entreprise->user->phone }}</p>
                <p class="mt-2 text-sm text-gray-500">Entreprise: {{ $entreprise->entreprise }}</p>

            </div>
            
        </div>
    </div>
</x-app-layout>
