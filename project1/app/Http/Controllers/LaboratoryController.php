<?php

namespace App\Http\Controllers;

use App\Models\Laboratory;
use App\Http\Requests\StoreLaboratoryRequest;
use App\Http\Requests\UpdateLaboratoryRequest;
use App\Models\Directeur;
use App\Models\User;
use Directory;

class LaboratoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $labos = Laboratory::paginate(10);

        return view('labos.index', compact('labos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $directors = Directeur::all();

        return view('labos.create', compact('directors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLaboratoryRequest $request)
    {

        $labo = new Laboratory();
        $labo->name = $request->name;
        $labo->directeur_id = $request->directeur_id;
        $labo->budget = $request->budget;
        $labo->save();
        return redirect()->route('listlabo');
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
    public function update(UpdateLaboratoryRequest $request, Laboratory $laboratory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Laboratory $laboratory)
    {
        //
    }
}
