<div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
    <div class="flex justify-end pb-2">
        @if (auth()->user()->hasRole('Etudiant'))
            <a href="{{ route('services.create') }}"
                class="px-4 py-2 text-sm font-semibold leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green">Add
                Service</a>
        @endif
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
                            Encadrant</th>
                        <th scope="col"
                            class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">
                            Frais du service</th>
                        <th scope="col"
                            class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">
                            Validation de Enseignant</th>
                        <th scope="col"
                            class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">
                            Validation de Directeur de Laboratoire</th>
                        <th scope="col"
                            class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">
                            Validation de Centre d'appui</th>
                        <th scope="col"
                            class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">
                            Execution de Service</th>
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
                                @foreach ($service->laboratory->users as $user)
                                    @foreach ($user->roles as $role)
                                        {{ $role->name == 'Encadrant' ? $user->name : '' }}
                                    @endforeach
                                @endforeach
                            </td>
                            <td
                                class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">
                                {{-- if the role is Centre d'appui add a form that have an input without a submit button just when you click enter the frais_service input post the value otherwise just show the value --}}
                                @if (auth()->user()->hasRole('Centre d\'appui'))
                                    {{ $service->frais_service }}
                                @else
                                    {{ $service->frais_service }}
                                @endif

                            </td>
                            <td
                                class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">
                                @if (auth()->user()->hasRole('Enseignant'))
                                   
                                    {{ $service->validation_enseignant }}
                                @else
                                    {{ $service->validation_enseignant }}
                                @endif
                            </td>
                            <td
                                class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">
                                @if (auth()->user()->hasRole('Directeur de laboratoire'))
                                    
                                    {{ $service->validation_directeur_labo }}
                                @else
                                    {{ $service->validation_directeur_labo }}
                                @endif
                            </td>
                            <td
                                class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">
                                @if (auth()->user()->hasRole('Centre d\'appui'))
                                  
                                    {{ $service->validation_centre_appui }}
                                @else
                                    {{ $service->validation_centre_appui }}
                                @endif
                            </td>
                            <td
                                class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">
                                @if (auth()->user()->hasRole('Centre d\'appui'))
                                   
                                    {{ $service->execution_service }}
                                @else
                                    {{ $service->execution_service }}
                                @endif
                            </td>

                            <td
                                class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500">
                                <a href="{{ route('services.edit', $service->id) }}" class="text-indigo-600 ">Edit</a>
                                <a href="{{ route('services.show', $service->id) }}" class="text-yellow-600 ">Show</a>
                                <form action="{{ route('services.destroy', $service->id) }}" method="POST"
                                    class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    {{-- a button without borders just Delete text in red --}}
                                    <button type="submit" class="text-red-600 ">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
