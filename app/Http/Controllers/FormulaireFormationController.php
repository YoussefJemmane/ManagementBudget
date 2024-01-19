<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use App\Models\FormulaireFormation;
use Illuminate\Http\Request;

class FormulaireFormationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // only the formations that are realted to the current user (Entreprise table is the User and the Formation table have the entreprise_id)
        $formations = FormulaireFormation::where('entreprise_id', Entreprise::where('user_id', auth()->user()->id)->get()->first()->id)->get();
        return view('formations.index', compact('formations'));
    }
    public function list()
    {
        // only the formations that are realted to the current user (Entreprise table is the User and the Formation table have the entreprise_id)
        $formations = FormulaireFormation::all();
        return view('centreanalyses.formations.index', compact('formations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('formations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'num_jour' => 'required|integer|min:3|max:5',
            'num_person' => 'required|integer|min:5|max:10',
        ]);

        $prix = 1000 * ($request->num_person * $request->num_jour);

        $formulaireFormation = FormulaireFormation::create([
            'num_jour' => $request->num_jour,
            'num_person' => $request->num_person,
            'entreprise_id' => Entreprise::where('user_id', auth()->user()->id)->get()->first()->id,
            'prix' =>   $prix,
        ]);
        return redirect()->route('formulaireformation.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(FormulaireFormation $formulaireFormation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FormulaireFormation $formulaireFormation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FormulaireFormation $formulaireFormation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FormulaireFormation $formulaireFormation)
    {
        //
    }

    public function validation(FormulaireFormation $formulaireformation)
    {
        $formulaireformation->update([
            'validation_centre_analyse' => "validate",
        ]);
        return redirect()->route('listformulaireformation.index');
    }
    public function novalidation(FormulaireFormation $formulaireformation)
    {
        $formulaireformation->update([
            'validation_centre_analyse' => "non validate",
        ]);
        return redirect()->route('listformulaireformation.index');
    }
}
