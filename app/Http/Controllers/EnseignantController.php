<?php

namespace App\Http\Controllers;

use App\Models\Enseignant;
use App\Models\Laboratory;
use App\Models\User;
use Illuminate\Http\Request;

class EnseignantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enseignants = Enseignant::all();

        return view('enseignants.index', compact('enseignants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $laboratories = Laboratory::all();
        return view('enseignants.create', compact('laboratories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $enseignant = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'enseignant',
            'password' => $request->password,
            'cin' => $request->cin,
            'phone' => $request->phone,
        ]);
        $enseignant->enseignants()->create([
            'ettablisement' => $request->ettablisement,
            'laboratory_id' => $request->laboratory_id,
        ]);

        return redirect()->route('enseignant.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Enseignant $enseignant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enseignant $enseignant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Enseignant $enseignant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enseignant $enseignant)
    {
        $enseignant->delete();
        return redirect()->route('enseignant.index');
    }
}
