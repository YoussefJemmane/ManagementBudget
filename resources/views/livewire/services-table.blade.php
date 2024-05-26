<div class="mx-auto max-w-7xl sm:px-6 lg:px-8" x-data="{ showModal: false, serviceId: null }">
    <div class="flex justify-end pb-2">
        @if (auth()->user()->hasRole('Etudiant'))
            <a href="{{ route('services.create') }}"
                class="px-4 py-2 text-sm font-semibold leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green">Add
                Service</a>
        @endif
    </div>
    <div id="frais-modal" tabindex="-1" aria-hidden="true" x-show="showModal"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-white-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-white-600">
                    <h3 class="text-xl font-semibold text-white-900 dark:text-black">
                        Add/Edit Frais Service
                    </h3>

                </div>
                <!-- Modal body -->
                <form :action="'{{ route('services.addFraisService', '') }}/' + serviceId" method="POST">
                    <div class="pl-4 pb-4 pr-4">
                        @csrf
                        @method('PUT')
                        <label class="block mb-2 text-sm font-medium text-white-900 dark:text-white"
                            for="frais_service">Frais Service</label>

                        <input
                            class="block w-full text-sm text-white-900 border border-white-300 rounded-lg cursor-pointer bg-white-50 dark:text-white-400 focus:outline-none dark:bg-white-700 dark:border-white-600 dark:placeholder-white-400"
                            id="frais_service" type="text" name="frais_service">
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-white-200 rounded-b dark:border-white-600">
                        <button data-modal-hide="frais-modal" type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                        <button data-modal-hide="frais-modal" type="button" @click="showModal = false"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-white-900 focus:outline-none bg-white rounded-lg border border-white-200 hover:bg-white-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-white-100 dark:focus:ring-white-700 dark:bg-white-800 dark:text-white-400 dark:border-white-600 dark:hover:text-dark dark:hover:bg-white-700">Decline</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <div class="w-full overflow-x-auto">
            <table class="w-full text-left border border-collapse rounded sm:border-separate border-slate-200"
                cellspacing="0">
                <tbody>
                    <tr>
                        <th scope="col"
                            class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">
                            Nom de la benificeur</th>
                        <th scope="col"
                            class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">
                            Type de service</th>
                        <th scope="col"
                            class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">
                            Directeur de Laboratoire</th>
                        <th scope="col"
                            class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">
                            Enseignant</th>
                        <th scope="col"
                            class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">
                            Frais du service</th>
                        @if (auth()->user()->hasRole('Enseignant'))
                            <th scope="col"
                                class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">
                                Validation de Enseignant</th>
                        @endif
                        @if (auth()->user()->hasRole('Enseignant|Etudiant|Pole de recherche'))
                            <th scope="col"
                                class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">
                                Status de Validation de Enseignant</th>
                        @endif
                        @if (auth()->user()->hasRole('Directeur de laboratoire'))
                            <th scope="col"
                                class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">
                                Validation de Directeur de Laboratoire</th>
                        @endif
                        @if (auth()->user()->hasRole('Directeur de laboratoire|Etudiant|Pole de recherche'))
                            <th scope="col"
                                class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">
                                Status de Validation de Directeur de Laboratoire</th>
                        @endif
                        @if (auth()->user()->hasRole('Centre d\'appui'))
                            <th scope="col"
                                class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">
                                Validation de Centre d'appui</th>
                            <th scope="col"
                                class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">
                                Execution de Service</th>
                        @endif
                        @if (auth()->user()->hasRole('Centre d\'appui|Etudiant|Pole de recherche'))
                            <th scope="col"
                                class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">
                                Status de Validation de Centre d'appui</th>
                            <th scope="col"
                                class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">
                                Status Execution de Service</th>
                        @endif

                            <th scope="col"
                                class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">
                                Action</th>

                    </tr>
                    @foreach ($services as $service)
                        <tr>
                            <td
                                class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">
                                {{ $service->user->name }}</td>
                            <td
                                class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">
                                {{ $service->type_service }}</td>
                            <td
                                class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">
                                @foreach ($service->laboratory->users as $user)
                                    @foreach ($user->roles as $role)
                                        {{ $role->name == 'Directeur de laboratoire' ? $user->name : '' }}
                                    @endforeach
                                @endforeach
                            </td>
                            <td
                                class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">
                                {{ $service->user->enseignant }}</td>
                            </td>
                            <td
                                class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">
                                @if ($service->frais_service)
                                    {{ $service->frais_service }}
                                @else
                                    @if(auth()->user()->hasRole('Centre d\'appui'))
                                    <button data-modal-target="frais-modal" data-modal-toggle="frais-modal"
                                        @click="showModal = true; serviceId = {{ $service->id }}"
                                        data-service-id="{{ $service->id }}" class="text-blue-600">Pas encore</button>
                                    @else
                                        Pas encore
                                    @endif
                                @endif
                            </td>

                            @if (auth()->user()->hasRole('Enseignant'))
                                <td
                                    class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">
                                    <form action="{{ route('services.validationenseignant', $service->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="text-green-600"
                                            {{ $service->execution_service === "execute" ? 'disabled' : '' }}
                                        >Validate</button>
                                    </form>
                                    <form action="{{ route('services.novalidationenseignant', $service->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="text-red-600"
                                            {{ $service->execution_service === "execute" ? 'disabled' : '' }}
                                        >Refuse</button>
                                    </form>
                                </td>
                            @endif
                            @if(auth()->user()->hasRole('Enseignant|Etudiant|Pole de recherche'))
                                <td
                                    class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">
                                    {{ $service->validation_enseignant }}
                                </td>
                            @endif
                            @if (auth()->user()->hasRole('Directeur de laboratoire'))
                                <td
                                    class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">
                                    <form action="{{ route('services.validationdirecteurlabo', $service->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="text-green-600"
                                            {{ $service->execution_service === "execute" ? 'disabled' : '' }}
                                        >Validate</button>
                                    </form>
                                    <form action="{{ route('services.novalidationdirecteurlabo', $service->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="text-red-600"
                                            {{ $service->execution_service === "execute" ? 'disabled' : '' }}
                                        >Refuse</button>
                                    </form>
                                </td>
                            @endif
                            @if (auth()->user()->hasRole('Directeur de laboratoire|Etudiant|Pole de recherche'))
                                <td
                                    class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">
                                    {{ $service->validation_directeur_labo }}

                                </td>
                            @endif
                            @if (auth()->user()->hasRole('Centre d\'appui'))
                                <td
                                    class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">
                                    <form action="{{ route('services.validationcentreappui', $service->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="text-green-600"
                                            {{ $service->frais_service ? '' : 'disabled' }}
                                            {{ $service->execution_service === "execute" ? 'disabled' : '' }}
                                        >Validate</button>
                                    </form>
                                    <form action="{{ route('services.novalidationcentreappui', $service->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="text-red-600"
                                            {{ $service->frais_service ? '' : 'disabled' }}
                                            {{ $service->execution_service === "execute" ? 'disabled' : '' }}
                                        >Refuse</button>
                                    </form>
                                </td>
                                <td
                                    class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">
                                    <form action="{{ route('services.executionservice', $service->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="text-green-600"
                                            {{ $service->validation_centre_appui === "validate" ? '' : 'disabled' }}
                                            {{ $service->execution_service === "execute" ? 'disabled' : '' }}
                                        >Execute</button>
                                    </form>
                                    <form action="{{ route('services.pendingservice', $service->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="text-red-600"
                                            {{ $service->validation_centre_appui === "validate" ? '' : 'disabled' }}
                                            {{ $service->execution_service === "execute" ? 'disabled' : '' }}
                                        >Pending</button>
                                    </form>
                                </td>
                            @endif
                            @if (auth()->user()->hasRole('Centre d\'appui|Etudiant|Pole de recherche'))
                                <td
                                    class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">
                                    {{ $service->validation_centre_appui }}
                                </td>
                                <td
                                    class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">
                                    {{ $service->execution_service }}
                                </td>
                            @endif
                            <td class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500">
                                @if (auth()->user()->hasRole('Centre d\'appui|Etudiant'))
                                    @if (auth()->user()->hasRole('Etudiant'))
                                        @if ($service->execution_service === "execute")
                                            <a href="{{ route('services.generatepdf', $service->id) }}" class="text-green-600">Download</a>
                                        @else
                                            <a href="{{ route('services.edit', $service->id) }}" class="text-indigo-600">Edit</a>
                                            <form action="{{ route('services.destroy', $service->id) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600">Delete</button>
                                            </form>
                                        @endif
                                    @elseif (auth()->user()->hasRole('Centre d\'appui'))

                                            @if ($service->frais_service && $service->execution_service !== "execute")
                                                <button data-modal-target="frais-modal" data-modal-toggle="frais-modal"
                                                        @click="showModal = true; serviceId = {{ $service->id }}"
                                                        data-service-id="{{ $service->id }}"
                                                        class="text-blue-600">Edit</button>
                                            @endif

                                    @endif
                                @endif
                                @if ($service->execution_service !== "execute")
                                    <a href="{{ route('services.show', $service->id) }}" class="text-yellow-600">Show</a>
                                @endif
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="m-4">
                {{ $services->links() }}
            </div>
        </div>

    </div>

</div>

