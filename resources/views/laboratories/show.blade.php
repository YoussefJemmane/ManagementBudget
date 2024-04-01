<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Show un Laboratoire') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="flex justify-center">
                        <h1 class="text-3xl font-bold text-center">{{ $laboratory->name }}</h1>
                    </div>
                    <div class="mt-6">
                        <div class="flex">
                            <div class="w-1/2">
                                <p class="font-bold">Budget:</p>
                                <p>{{ $laboratory->budget }} DH</p>
                            </div>
                            <div class="w-1/2">
                                <p class="font-bold">Directeur:</p>
                                @foreach ($laboratory->users as $user)
                                    @foreach ($user->roles as $role)
                                        @if ($role->name == 'Directeur de laboratoire')
                                            <p>{{ $user->name }}</p>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                        </div>

                        <div class="flex mt-4">
                            <div class="w-1/2">
                                <p class="font-bold">Créé le:</p>
                                <p>{{ $user->created_at }}</p>
                            </div>
                            <div class="w-1/2">
                                <p class="font-bold">Mis à jour le:</p>
                                <p>{{ $user->updated_at }}</p>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
