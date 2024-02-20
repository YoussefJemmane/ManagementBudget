<?php

namespace App\Http\Controllers;

use App\Models\Directeur;
use App\Models\User;
use Illuminate\Http\Request;

class DirecteurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $directeurs = Directeur::all();

        return view('directeurs.index', compact('directeurs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('directeurs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' =>  'required',
            'cin' => 'required',
            'phone' => 'required',
        ]);
        $directeur = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'cin' => $request->cin,
            'phone' => $request->phone,

        ]);
        $directeur->assignRole('directeur');
        $directeur->directeurs()->create();

        return redirect()->route('laboratory.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Directeur $directeur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Directeur $directeur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Directeur $directeur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Directeur $directeur)
    {
        $directeur->delete();
        return redirect()->route('directeur.index');
    }
}
