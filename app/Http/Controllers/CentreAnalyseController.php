<?php

namespace App\Http\Controllers;

use App\Models\CentreAnalyse;
use Illuminate\Http\Request;

class CentreAnalyseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $centreanalyse = CentreAnalyse::where('user_id', auth()->user()->id)->get()->first();
        return view('centreanalyses.index', compact('centreanalyse'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CentreAnalyse $centreAnalyse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CentreAnalyse $centreAnalyse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CentreAnalyse $centreAnalyse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CentreAnalyse $centreAnalyse)
    {
        //
    }
}
