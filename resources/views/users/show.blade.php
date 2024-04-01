<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Show un Utilisateurs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="flex justify-center">
                        <h1 class="text-3xl font-bold text-center">{{ $user->name }}</h1>
                    </div>
                    <div class="mt-6">
                        <div class="flex">
                            <div class="w-1/2">
                                <p class="font-bold">Nom:</p>
                                <p>{{ $user->name }}</p>
                            </div>
                            <div class="w-1/2">
                                <p class="font-bold">Email:</p>
                                <p>{{ $user->email }}</p>
                            </div>
                        </div>
                        <div class="flex mt-4">
                            <div class="w-1/2">
                                <p class="font-bold">Rôle:</p>
                                <p>
                                    @foreach ($user->roles as $role)
                                        <span>{{ $role->name }}</span>
                                    @endforeach
                                </p>
                            </div>
                            {{-- if role is even Etudiant, Enseignant, Directeur de laboratoire --}}
                            
                        </div>
                        <div class="flex mt-4">
                            {{-- if role is Etudiant  --}}
                            @if ($user->assignRole()->name == 'Etudiant')
                                <div class="w-1/2">
                                    <p class="font-bold">CNE:</p>
                                    <p>{{ $user->cne }}</p>
                                </div>
                            @endif
                            {{-- if there is a date_inscription --}}
                            @if ($user->assignRole()->name == 'Etudiant')
                                <div class="w-1/2">
                                    <p class="font-bold">Date d'inscription:</p>
                                    <p>{{ $user->date_inscription }}</p>
                                </div>
                            @endif
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
