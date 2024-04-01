<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Update Une User') }}
        </h2>
    </x-slot>

    <div class="flex justify-center py-12 ">
        <div class="border rounded-md bg-white p-[20px]  w-[1000px]">
            <form method="POST" action="{{ route('users.update', $user->id) }}" class=" pt-4 w-[900px] mx-auto"
                x-data="{ selectedRole: '{{ $user->roles->first()->id ?? '' }}' }">
                @csrf
                @method('PUT')
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-5 group">
                        <input id="name" value="{{ $user->name }}"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-dark dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            type="text" name="name" required autofocus value="{{ old('name') }}" />
                        <label for="name"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name</label>
                        @error('name')
                            <span class="text-xs italic text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="relative z-0 w-full mb-5 group">
                        <input id="cin" value="{{ $user->cin }}"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-dark dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            type="text" name="cin" required autofocus value="{{ old('cin') }}" />
                        <label for="cin"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Cin</label>
                        @error('cin')
                            <span class="text-xs italic text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-5 group">
                        <input id="email" value="{{ $user->email }}"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-dark dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            type="email" name="email" required value="{{ old('email') }}"
                            pattern="[a-z0-9._%+-]+@uit.ac.ma$" title="Email must end with @uit.ac.ma" />
                        <label for="email"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
                        @error('email')
                            <span class="text-xs italic text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input id="password"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-dark dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            type="password" name="password" required autocomplete="new-password" />
                        <label for="password"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
                        @error('password')
                            <span class="text-xs italic text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="relative z-0 w-full mb-5 group">
                    <input id="phone" value="{{ $user->phone }}"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-dark dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        type="text" name="phone" required autofocus value="{{ old('phone') }}" />
                    <label for="phone"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Phone</label>
                    @error('phone')
                        <span class="text-xs italic text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="relative z-0 w-full mb-5 group">
                    <select id="role" x-model="selectedRole" {{-- get the role that assign to this user  --}}
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-dark dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        name="role" required>
                        <option value="" disabled>Choose a role</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}" @if ($user->getRoleNames()->first() === $role->name) selected @endif>
                                {{ $role->name }}</option>
                        @endforeach
                    </select>

                    <label for="role"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Role</label>
                    @error('role')
                        <span class="text-xs italic text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div x-show="selectedRole == 5" class="relative z-0 w-full mb-5 group">
                    <input id="cne" value="{{ $user->cne }}"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-dark dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        type="text" name="cne" autofocus value="{{ old('cne') }}" />
                    <label for="cne"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">CNE</label>
                    @error('cne')
                        <span class="text-xs italic text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div x-show="selectedRole == 5" class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-5 group">
                        <input id="etablissement" value="{{ $user->etablissement }}"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-dark dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            type="text" name="etablissement" autofocus value="{{ old('etablissement') }}" />
                        <label for="etablissement"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Etablissement</label>
                        @error('etablissement')
                            <span class="text-xs italic text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input id="date_inscription" value="{{ $user->date_inscription }}"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-dark dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            type="date" name="date_inscription" autofocus value="{{ old('date_inscription') }}" />
                        <label for="date_inscription"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder
                            -shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Date
                            Inscription</label>
                        @error('date_inscription')
                            <span class="text-xs italic text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div x-show="selectedRole == 5" class="relative z-0 w-full mb-5 group">
                    {{-- Enseignant must be a select of all users who have role Enseignant the enseignant is a user in User Table  --}}
                    <select id="enseignant"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-dark dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        name="enseignant">
                        <option value="" disabled selected>Choose a enseignant</option>
                        @foreach ($users as $user)
                            @foreach ($user->roles as $role)
                                @if ($role->name == 'Enseignant')
                                    <option value="{{ $user->name }}" @if ($user->name === $user->name) selected @endif>{{ $user->name }}</option> 
                                @endif
                            @endforeach
                        @endforeach
                    </select>
                </div>

                <div x-show="selectedRole == 6" class="relative z-0 w-full mb-5 group">
                    <input id="etablissement" value="{{ $user->etablissement }}"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-dark dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        type="text" name="etablissement" autofocus value="{{ old('etablissement') }}" />
                    <label for="etablissement"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Etablissement</label>
                    @error('etablissement')
                        <span class="text-xs italic text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div x-show="selectedRole == 5 || selectedRole == 6 || selectedRole == 7"
                    class="relative z-0 w-full mb-5 group">
                    <select id="laboratory_id"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-dark dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        name="laboratory_id">
                        <option value="" disabled selected>Choose a laboratory</option>
                        @foreach ($laboratories as $laboratory)
                            <option value="{{ $laboratory->id }}" @if ($user->laboratory_id === $laboratory->id) selected @endif>
                                {{ $laboratory->name }}</option>
                        @endforeach
                    </select>
                    <label for="laboratory_id"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Laboratory</label>
                    @error('laboratory_id')
                        <span class="text-xs italic text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div x-show="selectedRole == 8" class="relative z-0 w-full mb-5 group">
                    <input id="entreprise" value="{{ $user->entreprise }}"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-dark dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        type="text" name="entreprise" autofocus value="{{ old('entreprise') }}" />
                    <label for="entreprise"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Entreprise</label>
                    @error('entreprise')
                        <span class="text-xs italic text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex items">
                    <button type="submit"
                        class="w-full py-2.5 px-5 text-sm font-semibold leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent  active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green">Create
                        User</button>
                </div>

            </form>

        </div>


    </div>
</x-app-layout>
