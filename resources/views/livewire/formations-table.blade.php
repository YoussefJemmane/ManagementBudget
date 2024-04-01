<div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

    {{-- add a button that add a formation --}}
    <div class="flex justify-end pb-2">
        @if (auth()->user()->hasRole('Entreprise'))
            <a href="{{ route('formulaireformation.create') }}"
                class="px-4 py-2 text-sm font-semibold leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green">Add
                Formation</a>
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
                            Nom de la responsable de l'entrperise</th>
                        <th scope="col"
                            class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">
                            Entreprise</th>
                        <th scope="col"
                            class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">
                            Numero des jour</th>
                        <th scope="col"
                            class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">
                            Numero des personnes</th>
                        <th scope="col"
                            class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">
                            Prix total</th>
                        @if (auth()->user()->hasRole('Entreprise'))
                            <th scope="col"
                                class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">
                                Action</th>
                        @endif
                        <th scope="col"
                            class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">
                            Validation</th>
                    </tr>
                    @foreach ($formations as $formation)
                        <tr>

                            <td
                                class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">
                                {{ $formation->user->name }}
                            </td>
                            <td
                                class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">
                                {{ $formation->user->entreprise }}
                            </td>
                            <td
                                class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">
                                {{ $formation->num_jour }}</td>
                            <td
                                class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">
                                {{ $formation->num_person }}</td>
                            <td
                                class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">
                                {{ $formation->prix }}</td>
                            @if (auth()->user()->hasRole('Entreprise'))
                                <td
                                    class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500">
                                    <a href="{{ route('formulaireformation.edit', $formation->id) }}"
                                        class="text-indigo-600 ">Edit</a>
                                    <a href="{{ route('formulaireformation.show', $formation->id) }}"
                                        class="text-yellow-600 ">Show</a>
                                    <form action="{{ route('formulaireformation.destroy', $formation->id) }}"
                                        method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        {{-- a button without borders just Delete text in red --}}
                                        <button type="submit" class="text-red-600 ">Delete</button>
                                    </form>
                                </td>
                            @endif
                            <td
                                class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">
                                @if (auth()->user()->hasRole('Centre d\'analyse'))
                                    <form
                                        action="{{ route('formulaireformationvalidationcentreanalyse.update', $formation->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="text-blue-600 ">Validate</button>
                                    </form>
                                    <form
                                        action="{{ route('formulaireformationnovalidationcentreanalyse.update', $formation->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="text-red-600 ">No Validate</button>
                                    </form>
                                @endif
                                {{ $formation->validation_centre_analyse }}
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
