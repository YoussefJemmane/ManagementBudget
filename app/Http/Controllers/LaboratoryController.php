<?php

namespace App\Http\Controllers;

use App\Models\Directeur;
use App\Models\Enseignant;
use App\Models\Laboratory;
use Illuminate\Http\Request;

class LaboratoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laboratories = Laboratory::all();

        return view('laboratories.index', compact('laboratories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $directeurs = Directeur::all();
        // only the directeur that don't have any laboratory
        $directeurs = Directeur::doesntHave('laboratory')->get();

        return view('laboratories.create', compact('directeurs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
           'name' => 'required',
           'budget' => 'required',
           'directeur_id' => 'required',
        ]);
        Laboratory::create([
            'name' => $request->name,
            'budget' => $request->budget,
            'directeur_id' => $request->directeur_id,
        ]);
        return redirect()->route('laboratory.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Laboratory $laboratory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Laboratory $laboratory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Laboratory $laboratory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Laboratory $laboratory)
    {
        $laboratory->delete();
        return redirect()->route('laboratory.index');
    }
}
