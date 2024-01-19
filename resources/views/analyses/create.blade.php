<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __("Create Un Analyse") }}
        </h2>
    </x-slot>

    <div class="flex justify-center py-12 ">
        <div class="border rounded-md bg-white p-[20px]  w-[400px]">
            <form method="POST" action="{{ route('formulaireanalyse.store') }}">
                @csrf

                <!-- Designation -->
                <div>
                    <x-input-label for="designantion" :value="__('Designation')" />
                    <select onchange="updateSemiDesignationOptions()" name="designantion" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="designation">
                        <option value="-1">
                            Choisir le designation
                        </option>
                        <option value="1">
                            Analyses chimiques par chromatographie
                        </option>
                        <option value="2">
                            Spectroscopie
                        </option>
                        <option value="3">
                            Spectrometrie
                        </option>
                        <option value="4">
                            Microscopie
                        </option>
                        <option value="5">
                            Cristallographie
                        </option>
                        <option value="6">
                            Analyses Environnementales
                        </option>
                    </select>
                    <x-input-error :messages="$errors->get('num_jour')" class="mt-2" />
                </div>
                <!-- Semi Designation -->
                <div class="mt-4">
                    <x-input-label for="semidesignation" :value="__('Semi Designation')" />
                    <select onchange="updateModeFacturation()" name="semidesignation" id="semidesignation" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="semidesignation">
                        <option value="">
                            Choisir le semi designation
                        </option>

                    </select>
                    <x-input-error :messages="$errors->get('num_person')" class="mt-2" />
                </div>
                <!-- Mode de Facturation -->
                <div class="mt-4">
                    <x-input-label for="mode_facturation" :value="__('Mode de Facturation')" />
                    <x-text-input id="mode_facturation" class="block mt-1 w-full" type="text" name="mode_facturation" :value="old('mode_facturation')" required autofocus />
                    <x-input-error :messages="$errors->get('mode_facturation')" class="mt-2" />
                </div>
                <!-- Prix Unitaire -->
                <div class="mt-4">
                    <x-input-label for="prix_unitaire" :value="__('Prix Unitaire')" />
                    <x-text-input id="prix_unitaire" class="block mt-1 w-full" type="text" name="prix_unitaire" :value="old('prix_unitaire')" required autofocus />
                    <x-input-error :messages="$errors->get('prix_unitaire')" class="mt-2" />
                </div>
                <!-- Qauntite -->
                <div class="mt-4">
                    <x-input-label for="quantite" :value="__('Qauntite')" />
                    <x-text-input id="quantite" class="block mt-1 w-full" type="text" name="quantite" :value="old('quantite')" required autofocus />
                    <x-input-error :messages="$errors->get('quantite')" class="mt-2" />
                </div>


                <div class="flex items-center justify-end mt-4">


                    <x-link-button class="ms-4" href="{{ route('formulairetraduction.index') }}">
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
<script>
    function updateSemiDesignationOptions() {

        var selectedDesignation = document.getElementById('designation').value;

        var semiDesignationSelect = document.getElementById('semidesignation');

        semiDesignationSelect.innerHTML = '<option value="">Choisir le semi designation</option>';

        switch (selectedDesignation) {
            case '1':
                semiDesignationSelect.innerHTML += '<option value="1">Chromatographie en Phase Gazeuse Couplée à la Spectrométrie de masse (GC- MS/MS) BRUKER 456-GC</option>';
                break;
            case '2':
                semiDesignationSelect.innerHTML += '<option value="2">Spectroscopie Infrarouge à Transformation de Fourier (FTIR)</option>';
                semiDesignationSelect.innerHTML += '<option value="3">Spectrophotometre à flamme</option>';
                semiDesignationSelect.innerHTML += '<option value="4">Spectrophotomètre UV-visible (échantillon liquide)</option>';
                break;
            case '3':
                semiDesignationSelect.innerHTML += '<option value="5">Spectrométrie d\'Emission Optique à Plasma à Couplage inductif (ICP-AES)</option>';
                semiDesignationSelect.innerHTML += '<option value="6">Spectrométrie d\'Emission Atomique à Plasma à Micro-ondes (MP-AES)</option>';
                semiDesignationSelect.innerHTML += '<option value="7">Spectrométrie d\'Absorption Atomique à Flamme (SAAF)</option>';
                break;
            case '4':
                semiDesignationSelect.innerHTML += '<option value="8">Microscope Optique Métallographique</option>';
                break;
            case '5':
                semiDesignationSelect.innerHTML += '<option value="9">Diffraction des Rayon X-Poudre</option>';
                break;
            case '6':
                semiDesignationSelect.innerHTML += '<option value="10">PH-mètre</option>';
                semiDesignationSelect.innerHTML += '<option value="11">Conductimetre</option>';
                semiDesignationSelect.innerHTML += '<option value="12">Turbidimètre</option>';
                semiDesignationSelect.innerHTML += '<option value="13">Physico-chimique (Cr-SO-Cat M Durté-Alcalinité-K-Na)</option>';
                semiDesignationSelect.innerHTML += '<option value="14">Critères de pollution (DCO-DBO-MES...)</option>';
                break;
            default:
                semiDesignationSelect.innerHTML += '<option value="">Choisir le semi designation</option>';
        }


    }

    function updateModeFacturation() {

        var selectedsemiDesignation = document.getElementById('semidesignation').value;

        var modeFacturation = document.getElementById('mode_facturation');

        var prixUnitaire = document.getElementById('prix_unitaire');

        switch (selectedsemiDesignation) {
            case '1':
                modeFacturation.value = 'Echantillon';
                prixUnitaire.value = '350';
                break;
            case '2':
                modeFacturation.value = 'Echantillon';
                prixUnitaire.value = '150';
                break;
            case '3':
                modeFacturation.value = 'Element (Li, Ba, Ca, K, Na)';
                prixUnitaire.value = '150';
                break;
            case '4':
                modeFacturation.value = 'Echantillon';
                 prixUnitaire.value = '150';
                break;
            case '5':
                modeFacturation.value = 'Element';
                 prixUnitaire.value = '150';
                break;
            case '6':
                modeFacturation.value = 'Element';
                 prixUnitaire.value = '150';
                break;
            case '7':
                modeFacturation.value = 'Element';
                 prixUnitaire.value = '150';
                break;
            case '8':
                modeFacturation.value = 'Echantillon';
                prixUnitaire.value = '80';
                break;
            case '9':
                modeFacturation.value = 'Echantillon';
                prixUnitaire.value = '250';
                break;
            case '10':
                modeFacturation.value = 'Echantillon';
                prixUnitaire.value = '80';
                break;
            case '11':
                modeFacturation.value = 'Echantillon';
                prixUnitaire.value = '80';
                break;
            case '12':
                modeFacturation.value = 'Echantillon';
                prixUnitaire.value = '80';

                break;
            case '13':
                modeFacturation.value = 'Element';
                prixUnitaire.value = '80';
                break;
            case '14':
                modeFacturation.value = 'Element';
                prixUnitaire.value = '150';
                break;

            default:
                modeFacturation.value = '';
                break;
        }

    }


</script>
