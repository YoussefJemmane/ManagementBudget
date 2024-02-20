<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __("Create Un Laboratoire") }}
        </h2>
    </x-slot>

    <div class="flex justify-center py-12 ">
        <div class="border rounded-md bg-white p-[20px]  w-[400px]">
            <form method="POST" action="{{ route('laboratory.store') }}" class="max-w-md pt-4 mx-auto">
                @csrf
                <div class="grid md:grid-cols-2 md:gap-6">
                    <!-- Name -->
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="name" id="name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-dark dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name</label>
                        @error('name')
                        <span class="text-xs italic text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Budget -->
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="budget" id="budget" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-dark dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="budget" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Budget</label>
                        @error('budget')
                        <span class="text-xs italic text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


                <!-- Directeur -->
                <div class="relative z-0 w-full mb-5 group">
                    <select name="directeur_id" id="directeur_id" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-dark dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                        @foreach ($directeurs as $directeur)
                        <option value="{{ $directeur->id }}">{{ $directeur->user->name }}</option>
                        @endforeach
                    </select>
                    <label for="directeur" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"> Diecteur</label>
                    @error('directeur_id')
                    <span class="text-xs italic text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex items-center justify-end gap-4 mt-4">
                    <button onclick="window.location='{{ route('users.index') }}'" class="w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
                        {{ __('Annuler') }}
                    </button>

                    <button type="submit" class="w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                        {{ __('Submit') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
