<?php

namespace App\Http\Controllers;

use App\Models\Directeur;
use App\Models\FormulaireAnalyse;
use App\Models\Laboratory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FormulaireAnalyseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $analyses = FormulaireAnalyse::where('user_id', auth()->user()->id)->get();
        return view('analyses.index', compact('analyses'));
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
            "laboratory_id" => auth()->user()->students->map->enseignant->map->laboratory_id->first(),
        ]);

        return redirect()->route('formulaireanalyse.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(FormulaireAnalyse $formulaireAnalyse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FormulaireAnalyse $formulaireAnalyse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FormulaireAnalyse $formulaireAnalyse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FormulaireAnalyse $formulaireAnalyse)
    {
        //
    }

    public function validationcentreanalyse(Request $request, FormulaireAnalyse $formulaireanalyse)
    {
        $formulaireanalyse->update([
            "validation_centre_analyse" => "validate",
        ]);
        return redirect()->route('listformulaireanalyse.index');
    }
    public function novalidationcentreanalyse(Request $request, FormulaireAnalyse $formulaireanalyse)
    {
        $formulaireanalyse->update([
            "validation_centre_analyse" => "non validate",
        ]);
        return redirect()->route('listformulaireanalyse.index');
    }
    public function validationdirecteurlabo(Request $request, FormulaireAnalyse $formulaireanalyse)
    {
        $formulaireanalyse->update([
            "validation_directeur_labo" => "validate",
        ]);

        $laboratory = Laboratory::find($formulaireanalyse->laboratory_id);
        $laboratory->update([
            "budget" => $laboratory->budget - $formulaireanalyse->prix_total,
        ]);
        return redirect()->route('listformulaireanalysebylabo.index');
    }
    public function novalidationdirecteurlabo(Request $request, FormulaireAnalyse $formulaireanalyse)
    {
        $formulaireanalyse->update([
            "validation_directeur_labo" => "non validate",
        ]);

        return redirect()->route('listformulaireanalysebylabo.index');
    }
    public function validationenseignant(Request $request, FormulaireAnalyse $formulaireanalyse)
    {
        $formulaireanalyse->update([
            "validation_enseignant" => "validate",
        ]);
        return redirect()->route('listformulaireanalysebylabo.index');
    }
    public function novalidationenseignant(Request $request, FormulaireAnalyse $formulaireanalyse)
    {
        $formulaireanalyse->update([
            "validation_enseignant" => "non validate",
        ]);
        return redirect()->route('listformulaireanalysebylabo.index');
    }
    public function list()
    {

        $analyses = FormulaireAnalyse::all();
        return view('centreanalyses.analyses.index', compact('analyses'));
    }
    public function listByLaboratory()
    {
        if (auth()->user()->role == "directeur") {
            $directeur = Directeur::where('user_id', auth()->user()->id)->first();
            $laboratoryId = Laboratory::where('directeur_id', $directeur->id)->first()->id;

            $analyses = FormulaireAnalyse::where('laboratory_id', $laboratoryId)->get();
            return view('centreanalyses.analyses.index', compact('analyses'));
        }
        $laboratoryId = auth()->user()->enseignants->map->laboratory->first()->id;

        $analyses = FormulaireAnalyse::where('laboratory_id', $laboratoryId)->get();
        return view('centreanalyses.analyses.index', compact('analyses'));
    }
}
