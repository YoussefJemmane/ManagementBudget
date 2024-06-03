<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Create a Service') }}
        </h2>
    </x-slot>

    <div class="flex justify-center py-12 " x-data="{ selectedForm: '' }">

        <div class="border rounded-md bg-white p-[20px]  w-[1000px]">
            <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data"
                x-data="{ selectedForm: @json(old('service')) }" class=" pt-4 w-[900px] mx-auto">
                @csrf

                <div class="mb-4 flex justify-around pt-3">
                    <label class="text-lg font-semibold">Choose a service :</label>
                    <input type="radio" id="traductionCheckbox" name="service" value="traduction" required
                        x-model="selectedForm" x-bind:value="'traduction'" />
                    <label for="traductionCheckbox">Traduction</label><br>
                    <input type="radio" id="publicationCheckbox" name="service" value="publication" required
                        x-model="selectedForm" x-bind:value="'publication'" />
                    <label for="publicationCheckbox">Publication</label><br>
                    <input type="radio" id="revisionCheckbox" name="service" value="revision" required
                        x-model="selectedForm" x-bind:value="'revision'" />
                    <label For="revisionCheckbox">Revision</label><br>
                </div>

                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="titre" id="titre"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-dark dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="titre"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Titre
                    </label>
                    @error('titre')
                        <span class="text-xs italic text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div x-show="selectedForm === 'publication'">
                    <div class="relative z-0 w-full mb-5 group" x-data="{ requiredFields: selectedForm === 'publication' }">
                        <input id="intitule_article"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-dark dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            type="text" name="intitule_article" :required="requiredFields" autofocus />
                        <label for="intitule_article"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Intitule Article
                        </label>
                        @error('intitule_article')
                            <span class="text-xs italic text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="relative z-0 w-full mb-5 group" x-data="{ requiredFields: selectedForm === 'publication' }">
                            <input id="intitule_journal"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-dark dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                type="text" name="intitule_journal" :required="requiredFields" autofocus />
                            <label for="intitule_journal"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                Intitule Journal
                            </label>
                            @error('intitule_journal')
                                <span class="text-xs italic text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="relative z-0 w-full mb-5 group" x-data="{ requiredFields: selectedForm === 'publication' }">
                            <input id="ISSN"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-dark dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                type="text" name="ISSN" :required="requiredFields" autofocus />
                            <label for="ISSN"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                ISSN
                            </label>
                            @error('ISSN')
                                <span class="text-xs italic text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="relative z-0 w-full mb-5 group" x-data="{ requiredFields: selectedForm === 'publication' }">
                            <input id="base_donne_indexation"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-dark dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                type="text" name="base_donne_indexation" :required="requiredFields" autofocus />
                            <label for="base_donne_indexation"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                Base Donne Indexation
                            </label>
                            @error('base_donne_indexation')
                                <span class="text-xs italic text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="relative z-0 w-full mb-5 group" x-data="{ requiredFields: selectedForm === 'publication' }">
                            <input id="qualite_article"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-dark dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                type="text" name="qualite_article" :required="requiredFields" autofocus />
                            <label for="qualite_article"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                Qualite Article
                            </label>
                            @error('qualite_article')
                                <span class="text-xs italic text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="relative z-0 w-full mb-5 group" x-data="{ requiredFields: selectedForm === 'publication' }">
                            <input id="lettre_acceptation"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-dark dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                type="file" name="lettre_acceptation" :required="requiredFields" accept=".pdf" max-size="2097152" autofocus/>
                            <label for="lettre_acceptation"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                Lettre d'acceptation <span class="text-xs italic text-red-500">* 2MB (pdf)</span>
                            </label>
                            @error('lettre_acceptation')
                                <span class="text-xs italic text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="relative z-0 w-full mb-5 group" x-data="{ requiredFields: selectedForm === 'publication' }">
                            <input id="devis_journal"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-dark dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                type="file" name="devis_journal" :required="requiredFields" autofocus accept=".pdf" max-size="2097152"/>
                            <label for="devis_journal"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                Devis de Journal <span class="text-xs italic text-red-500">* 2MB (pdf)</span>
                            </label>
                            @error('devis_journal')
                                <span class="text-xs italic text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input id="article"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-dark dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            type="file" name="article" autofocus :required="requiredFields" accept=".pdf" max-size="5242880"/>
                        <label for="article"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Article<span class="text-xs italic text-red-500">* 5MB (pdf)</span>
                        </label>
                        @error('article')
                            <span class="text-xs italic text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <template x-if="selectedForm === 'traduction' || selectedForm === 'revision'">
                    <div class="relative z-0 w-full mb-5 group">
                        <input id="article"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-dark dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            type="file" name="article" required autofocus accept=".doc, .docx" max-size="5242880"/>
                        <label for="article"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Article<span class="text-xs italic text-red-500">* 5MB (doc, docx)</span>
                        </label>
                        @error('article')
                            <span class="text-xs italic text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </template>
                <div class="flex items-center justify-end mt-4">
                    <x-link-button class="ms-4" href="{{ route('services.index') }}">
                        {{ __('Annuler') }}
                    </x-link-button>
                    <x-primary-button class="ms-4">
                        {{ __('Submit') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
