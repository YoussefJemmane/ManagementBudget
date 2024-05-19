
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Show un Service') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="flex justify-center">
                        <h1 class="text-3xl font-bold text-center">Service : {{ $service->designation }}</h1>
                    </div>
                    <div class="mt-6">
                        <div class="flex">
                            <div class="w-1/2">
                                <p class="font-bold">Type de Service:</p>
                                <p>{{ $service->type_service }}</p>
                            </div>
                            <div class="w-1/2">
                                <p class="font-bold">Demendeur :</p>
                                @foreach ($service->laboratory->users as $user)
                                    @foreach ($user->roles as $role)
                                        @if ($role->name == 'Etudiant')
                                            {{--                                        must part the nom and prenom by " " from {{ $user->name }}--}}
                                            <p>Nom : {{ explode(" ", $user->name)[0] }}</p>
                                            <p>Prenom : {{ explode(" ", $user->name)[1] }}</p>
                                        @endif

                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                        <div class="flex">
                            <div class="w-1/2">
                                <p class="font-bold">Telephone:</p>
                                @foreach($service->laboratory->users as $user)
                                    @foreach($user->roles as $role)
                                        @if($role->name == 'Etudiant')
                                            <p>{{ $user->phone }}</p>
                                        @endif
                                    @endforeach

                                @endforeach
                            </div>
                            <div class="w-1/2">
                                <p class="font-bold">Email :</p>
                                @foreach ($service->laboratory->users as $user)
                                    @foreach ($user->roles as $role)
                                        @if ($role->name == 'Etudiant')
                                            <p>{{ $user->email }}</p>
                                        @endif

                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                        <div class="flex">
                            <div class="w-1/2">
                                <p class="font-bold">Validation de Directeur de Labo:</p>
                                {{ $service->validation_directeur_labo }}
                            </div>
                            <div class="w-1/2">
                                <p class="font-bold">Validation de l'enseignant :</p>
                                {{ $service->validation_enseignant }}
                            </div>
                        </div>
                        <div class="flex">
                            <div class="w-1/2">
                                <p class="font-bold">Article :</p>
                                <a href="{{ route('services.articlePDF', ['service' => $service->id]) }}">Telecharger</a>
                            </div>
                            <div class="w-1/2">
                                <p class="font-bold">Lettre d'acceptation :</p>
                                <a href="{{ route('services.lettreacceptationPDF', ['service' => $service->id]) }}">Telecharger</a>

                            </div>
                        </div>

                        <div class="flex mt-4">
                            <div class="w-1/2">
                                <p class="font-bold">Créé le:</p>
                                <p>{{ $service->created_at }}</>
                            </div>
                            <div class="w-1/2">
                                <p class="font-bold">Mis à jour le:</p>
                                <p>{{ $service->updated_at }}</p>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
