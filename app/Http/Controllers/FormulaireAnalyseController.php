<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\FormulaireAnalyse;
use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\AnalyseStored;
use App\Notifications\AnalyseExecuted;
use App\Notifications\AnalyseValidated;
use Illuminate\Support\Facades\Validator;

class FormulaireAnalyseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('analyses.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('analyses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "designantion" => "required",
            "semidesignation" => "required",
            "mode_facturation" => "required",
            "prix_unitaire" => "required",
            "quantite" => "required",
        ]);
        switch ($request->designantion) {
            case '1':
                $designantion = "Analyses chimiques par chromatographie";
                break;
            case '2':
                $designantion = "Spectroscopie";
                break;
            case '3':
                $designantion = "Spectrometrie";
                break;
            case '4':
                $designantion = "Microscopie";
                break;
            case '5':
                $designantion = "Cristallographie";
                break;
            case '6':
                $designantion = "Analyses Environnementales";
                break;
            default:
                $designantion = "Autre";
                break;
        }
        switch ($request->semidesignation) {
            case '1':
                $semidesignation = "Chromatographie en Phase Gazeuse Couplée à la Spectrométrie de masse (GC- MS/MS) BRUKER 456-GC";
                $mode_facturation = "Echantillon";
                $prix_unitaire = 350;
                break;
            case '2':
                $semidesignation = "Spectroscopie Infrarouge à Transformation de Fourier (FTIR)";
                $mode_facturation = "Echantillon";
                $prix_unitaire = 150;

                break;
            case '3':
                $semidesignation = "Spectrophotometre à flamme";
                $mode_facturation = "Element (Li, Ba, Ca, K, Na)";
                $prix_unitaire = 150;

                break;
            case '4':
                $semidesignation = "Spectrophotomètre UV-visible (échantillon liquide)";
                $mode_facturation = "Echantillon";
                $prix_unitaire = 150;

                break;
            case '5':
                $semidesignation = "Spectrométrie d\'Emission Optique à Plasma à Couplage inductif (ICP-AES)";
                $mode_facturation = "Element";
                $prix_unitaire = 150;

                break;
            case '6':
                $semidesignation = "Spectrométrie d\'Emission Atomique à Plasma à Micro-ondes (MP-AES)";
                $mode_facturation = "Element";
                $prix_unitaire = 150;

                break;
            case '7':
                $semidesignation = "Spectrométrie d\'Absorption Atomique à Flamme (SAAF)";
                $mode_facturation = "Element";
                $prix_unitaire = 150;

                break;
            case '8':
                $semidesignation = "Microscope Optique Métallographique";
                $mode_facturation = "Echantillon";
                $prix_unitaire = 80;

                break;
            case '9':
                $semidesignation = "Diffraction des Rayon X-Poudre";
                $mode_facturation = "Echantillon";
                $prix_unitaire = 250;
                break;
            case '10':
                $semidesignation = "PH-mètre";
                $mode_facturation = "Echantillon";
                $prix_unitaire = 80;
                break;
            case '11':
                $semidesignation = "Conductimetre";
                $mode_facturation = "Echantillon";
                $prix_unitaire = 80;
                break;
            case '12':
                $semidesignation = "Turbidimètre";
                $mode_facturation = "Echantillon";
                $prix_unitaire = 80;
                break;
            case '13':
                $semidesignation = "Physico-chimique (Cr-SO-Cat M Durté-Alcalinité-K-Na)";
                $mode_facturation = "Element";
                $prix_unitaire = 80;
                break;
            case '14':
                $semidesignation = "Critères de pollution (DCO-DBO-MES...)";
                $mode_facturation = "Element";
                $prix_unitaire = 150;
                break;
            default:
                $semidesignation = "Autre";
                $mode_facturation = "Autre";
                $prix_unitaire = 0;
                break;
        }

        $analyse = FormulaireAnalyse::create([
            "user_id" => auth()->user()->id,
            "designantion" => $designantion,
            "description" => $semidesignation,
            "mode_facturation" => $mode_facturation,
            "prix_unitaire" => $prix_unitaire,
            "quantite" => $request->quantite,
            "prix_total" => $request->prix_unitaire * $request->quantite,
            "laboratory_id" => auth()->user()->laboratory_id,
        ]);

        // Get the enseignant
    $enseignant = User::where('name', auth()->user()->enseignant)->first();

    // If the enseignant exists, send the notification
    if ($enseignant) {
        $enseignant->notify(new AnalyseStored());
    }
        return redirect()->route('formulaireanalyse.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(FormulaireAnalyse $formulaireanalyse)
    {
        return view('analyses.show', compact('formulaireanalyse'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FormulaireAnalyse $formulaireanalyse)
    {
        return view('analyses.edit', compact('formulaireanalyse'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FormulaireAnalyse $formulaireanalyse)
    {
        $request->validate([
            "designantion" => "required",
            "semidesignation" => "required",
            "mode_facturation" => "required",
            "prix_unitaire" => "required",
            "quantite" => "required",
        ]);
        switch ($request->designantion) {
            case '1':
                $designantion = "Analyses chimiques par chromatographie";
                break;
            case '2':
                $designantion = "Spectroscopie";
                break;
            case '3':
                $designantion = "Spectrometrie";
                break;
            case '4':
                $designantion = "Microscopie";
                break;
            case '5':
                $designantion = "Cristallographie";
                break;
            case '6':
                $designantion = "Analyses Environnementales";
                break;
            default:
                $designantion = "Autre";
                break;
        }
        switch ($request->semidesignation) {
            case '1':
                $semidesignation = "Chromatographie en Phase Gazeuse Couplée à la Spectrométrie de masse (GC- MS/MS) BRUKER 456-GC";
                $mode_facturation = "Echantillon";
                $prix_unitaire = 350;
                break;
            case '2':
                $semidesignation = "Spectroscopie Infrarouge à Transformation de Fourier (FTIR)";
                $mode_facturation = "Echantillon";
                $prix_unitaire = 150;

                break;
            case '3':
                $semidesignation = "Spectrophotometre à flamme";
                $mode_facturation = "Element (Li, Ba, Ca, K, Na)";
                $prix_unitaire = 150;

                break;
            case '4':
                $semidesignation = "Spectrophotomètre UV-visible (échantillon liquide)";
                $mode_facturation = "Echantillon";
                $prix_unitaire = 150;

                break;
            case '5':
                $semidesignation = "Spectrométrie d\'Emission Optique à Plasma à Couplage inductif (ICP-AES)";
                $mode_facturation = "Element";
                $prix_unitaire = 150;

                break;
            case '6':
                $semidesignation = "Spectrométrie d\'Emission Atomique à Plasma à Micro-ondes (MP-AES)";
                $mode_facturation = "Element";
                $prix_unitaire = 150;

                break;
            case '7':
                $semidesignation = "Spectrométrie d\'Absorption Atomique à Flamme (SAAF)";
                $mode_facturation = "Element";
                $prix_unitaire = 150;

                break;
            case '8':
                $semidesignation = "Microscope Optique Métallographique";
                $mode_facturation = "Echantillon";
                $prix_unitaire = 80;

                break;
            case '9':
                $semidesignation = "Diffraction des Rayon X-Poudre";
                $mode_facturation = "Echantillon";
                $prix_unitaire = 250;
                break;
            case '10':
                $semidesignation = "PH-mètre";
                $mode_facturation = "Echantillon";
                $prix_unitaire = 80;
                break;
            case '11':
                $semidesignation = "Conductimetre";
                $mode_facturation = "Echantillon";
                $prix_unitaire = 80;
                break;
            case '12':
                $semidesignation = "Turbidimètre";
                $mode_facturation = "Echantillon";
                $prix_unitaire = 80;
                break;
            case '13':
                $semidesignation = "Physico-chimique (Cr-SO-Cat M Durté-Alcalinité-K-Na)";
                $mode_facturation = "Element";
                $prix_unitaire = 80;
                break;
            case '14':
                $semidesignation = "Critères de pollution (DCO-DBO-MES...)";
                $mode_facturation = "Element";
                $prix_unitaire = 150;
                break;
            default:
                $semidesignation = "Autre";
                $mode_facturation = "Autre";
                $prix_unitaire = 0;
                break;
        }
        $formulaireanalyse->update([
            "user_id" => auth()->user()->id,
            "designantion" => $designantion,
            "description" => $semidesignation,
            "mode_facturation" => $mode_facturation,
            "prix_unitaire" => $prix_unitaire,
            "quantite" => $request->quantite,
            "prix_total" => $request->prix_unitaire * $request->quantite,
        ]);
        return redirect()->route('formulaireanalyse.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FormulaireAnalyse $formulaireanalyse)
    {

        $formulaireanalyse->delete();
        return redirect()->route('formulaireanalyse.index');
    }

    public function validationcentreanalyse(Request $request, FormulaireAnalyse $formulaireanalyse)
    {
        $formulaireanalyse->update([
            "validation_centre_analyse" => "validate",
            "execution_analyse" => "pending",
        ]);
        return redirect()->route('formulaireanalyse.index');
    }
    public function novalidationcentreanalyse(Request $request, FormulaireAnalyse $formulaireanalyse)
    {
        $formulaireanalyse->update([
            "validation_centre_analyse" => "non validate",
        ]);

        return redirect()->route('formulaireanalyse.index');
    }
    public function validationdirecteurlabo(Request $request, FormulaireAnalyse $formulaireanalyse)
    {
        $formulaireanalyse->update([
            "validation_directeur_labo" => "validate",

        ]);

        $centreAnalyse = User::Role('Centre d\'analyse')->first();

        // If the centre d'appui exists, send the notification
        if ($centreAnalyse) {
            $centreAnalyse->notify(new AnalyseValidated());
        }

        return redirect()->route('formulaireanalyse.index');
    }
    public function novalidationdirecteurlabo(Request $request, FormulaireAnalyse $formulaireanalyse)
    {
        $formulaireanalyse->update([
            "validation_directeur_labo" => "non validate",
        ]);

        return redirect()->route('formulaireanalyse.index');
    }
    public function validationenseignant(Request $request, FormulaireAnalyse $formulaireanalyse)
    {
        $formulaireanalyse->update([
            "validation_enseignant" => "validate",
        ]);

        // notify the directeur de laboratoire from laboratory_id of the auth user about the validation of the service ServiceValidatedByEnseignant
        $directeur = User::where('laboratory_id', auth()->user()->laboratory_id)->Role('Directeur de laboratoire')->first();

        // If the directeur exists, send the notification
        if ($directeur) {
            $directeur->notify(new AnalyseValidated());
        }
        return redirect()->route('formulaireanalyse.index');
    }
    public function novalidationenseignant(Request $request, FormulaireAnalyse $formulaireanalyse)
    {
        $formulaireanalyse->update([
            "validation_enseignant" => "non validate",
        ]);
        return redirect()->route('formulaireanalyse.index');
    }


    public function pendinganalyse(Request $request, FormulaireAnalyse $formulaireanalyse){
        $formulaireanalyse->update([
            "execution_analyse" => "pending",
        ]);

        // if i hit this after the execution already done i will increase the budget of the laboratory by the prix_total
        $formulaireanalyse->laboratory->update([
            'budget' => $formulaireanalyse->laboratory->budget + $formulaireanalyse->prix_total,
        ]);
        return redirect()->route('formulaireanalyse.index');
    }
    public function executeanalyse(Request $request, FormulaireAnalyse $formulaireanalyse){

        if ($formulaireanalyse->laboratory->budget < $formulaireanalyse->prix_total) {

            $newBudget = $formulaireanalyse->laboratory->budget - $formulaireanalyse->prix_total;

            $validator = Validator::make(['budget' => $newBudget], [
                'budget' => 'gte:0',
            ], [
                'budget.min' => 'The laboratory does not have enough budget to execute this service.',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }
        }

        if ($formulaireanalyse->laboratory->budget >= $formulaireanalyse->prix_total) {
            $newBudget = $formulaireanalyse->laboratory->budget - $formulaireanalyse->prix_total;

            $formulaireanalyse->laboratory->update([
                'budget' => $newBudget,
            ]);
            $formulaireanalyse->update([
                "execution_analyse" => "execute",
            ]);

            $formulaireanalyse->user->notify(new AnalyseExecuted());

            return redirect()->route('formulaireanalyse.index');
        }


    }

    public function generatepdf(FormulaireAnalyse $formulaireanalyse)
    {
        $data=[
            'formulaireanalyse'=>$formulaireanalyse
        ];

        $pdf=Pdf::loadView('analyses.pdf',$data);

        return response()->streamDownload(function() use($pdf){
            echo $pdf->stream();
        },'formulaireanalyse.pdf');
    }

}
