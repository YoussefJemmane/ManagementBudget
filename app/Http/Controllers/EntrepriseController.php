<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use App\Models\User;
use Illuminate\Http\Request;

class EntrepriseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // show only the entreprise of the current user
        $entreprise = Entreprise::where('user_id', auth()->user()->id)->get()->first();
        return view('entreprises.index', compact('entreprise'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('entreprises.create');
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
            'entreprise' =>'required',
        ]);
        $entreprise = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'cin' => $request->cin,
            'phone' => $request->phone,

        ]);
        $entreprise->assignRole('entreprise');
        $entreprise->entreprises()->create([
            'entreprise' => $request->entreprise,
        ]);
        return redirect()->route('login');
    }

    /**
     * Display the specified resource.
     */
    public function show(Entreprise $entreprise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Entreprise $entreprise)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Entreprise $entreprise)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Entreprise $entreprise)
    {
        //
    }
}
