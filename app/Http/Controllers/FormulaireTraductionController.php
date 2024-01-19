<?php

namespace App\Http\Controllers;

use App\Models\FormulaireTraduction;
use Illuminate\Http\Request;

class FormulaireTraductionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $traductions = FormulaireTraduction::where('user_id', auth()->user()->id)->get();
        return view('traductions.index', compact('traductions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('traductions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(FormulaireTraduction $formulaireTraduction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FormulaireTraduction $formulaireTraduction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FormulaireTraduction $formulaireTraduction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FormulaireTraduction $formulaireTraduction)
    {
        //
    }
}
