<div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
    <div class="flex flex-wrap items-center justify-between pb-4">
        <input wire:model.live="search" type="text" placeholder="Search by entreprise" class="px-4 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300">
        @if(auth()->user()->hasRole('entreprise'))

        <a href="{{ route('formulaireformation.create') }}" class="p-2 text-white bg-blue-600 rounded-md hover:bg-blue-700">
            Ajouter un Formation
        </a>
        @endif

    </div>
    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <div class="w-full overflow-x-auto">
            <table class="w-full text-left border border-collapse rounded sm:border-separate border-slate-200" cellspacing="0">
                <tbody>
                    <tr>
                        <th scope="col" class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">Nom de la responsable de l'entrperise</th>
                        <th scope="col" class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">Entreprise</th>
                        <th scope="col" class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">Numero des jour</th>
                        <th scope="col" class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">Numero des personnes</th>
                        <th scope="col" class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">Prix total</th>
                        @if(auth()->user()->hasRole('entreprise'))

                        <th scope="col" class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">Action</th>
                        @endif
                        <th scope="col" class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">Validation</th>
                    </tr>
                    @foreach ($formations as $formation)

                    <tr>

                        <td class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">{{ $formation->entreprise->user->name }}</td>
                        <td class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">{{ $formation->entreprise->entreprise }}</td>
                        <td class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">{{ $formation->num_jour }}</td>
                        <td class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">{{ $formation->num_person }}</td>
                        <td class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 "> {{ $formation->prix }}</td>
                        @if(auth()->user()->hasRole('entreprise'))

                        <td class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500">
                            <a href="{{ route('formulaireformation.edit', $formation->id) }}" class="text-indigo-600 ">Edit</a>
                            <a href="{{ route('formulaireformation.show', $formation->id) }}" class="text-yellow-600 ">Show</a>
                            <form action="{{ route('formulaireformation.destroy', $formation->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                {{-- a button without borders just Delete text in red --}}
                                <button type="submit" class="text-red-600 ">Delete</button>
                            </form>
                        </td>
                        @endif
                        <td class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">
                            @if(auth()->user()->hasRole('centreanalyse'))

                            <form action="{{ route('formulaireformationvalidationcentreanalyse.update', $formation->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="text-blue-600 ">Validate</button>
                            </form>
                            <form action="{{ route('formulaireformationnovalidationcentreanalyse.update', $formation->id) }}" method="POST">
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
