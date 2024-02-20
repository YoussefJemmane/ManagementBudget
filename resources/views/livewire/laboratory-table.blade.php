<div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
    <div class="pb-4">
        <div class="flex flex-wrap items-center justify-between">

            <input wire:model.live="search" type="text" placeholder="Search by Name" class="block w-full max-w-xs border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            <div>
                <a href="{{ route('laboratory.create') }}" class="p-2 text-white bg-blue-600 rounded-md hover:bg-blue-700">
                    Ajouter un Laboratoire
                </a>
            </div>
        </div>
    </div>
    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <div class="w-full overflow-x-auto">
            <table class="w-full text-left border border-collapse rounded sm:border-separate border-slate-200" cellspacing="0">

                <tbody>
                    <tr>
                        <th scope="col" class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">Name</th>
                        <th scope="col" class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">Directeur</th>
                        <th scope="col" class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">Action</th>

                    </tr>
                    @foreach ($laboratories as $laboratory)

                    <tr>

                        <td class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">{{ $laboratory->name }}</td>
                        <td class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">{{ $laboratory->directeur->user->name }}</td>
                        <td class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500">
                            <a href="{{ route('laboratory.edit', $laboratory->id) }}" class="text-indigo-600 ">Edit</a>
                            <a href="{{ route('laboratory.show', $laboratory->id) }}" class="text-yellow-600 ">Show</a>
                            <form action="{{ route('laboratory.destroy', $laboratory->id) }}" method="POST" class="inline-block">
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
            <div class="m-4">
                {{ $laboratories->links() }}
            </div>
        </div>
    </div>
</div>
