<?php

namespace App\Http\Controllers;
use Rap2hpoutre\FastExcel\FastExcel;

use App\Models\Directeur;
use App\Models\Enseignant;
use App\Models\Laboratory;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;


class LaboratoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laboratories = Laboratory::all();
        $users = User::all();
        return view('laboratories.index', compact('laboratories', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('laboratories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
           'name' => 'required',
           'budget' => 'required',

        ]);
        Laboratory::create([
            'name' => $request->name,
            'budget' => $request->budget,
            'first_budget' => $request->budget,
        ]);
        return redirect()->route('laboratory.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Laboratory $laboratory)
    {
        return view('laboratories.show', compact('laboratory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Laboratory $laboratory)
    {
        return view('laboratories.edit', compact('laboratory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Laboratory $laboratory)
    {
        $request->validate([
            'name' => 'required',
            'budget' => 'required',
        ]);
        $laboratory->update([
            'name' => $request->name,
            'budget' => $request->budget,
            'first_budget' => $request->budget,
        ]);
        return redirect()->route('laboratory.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Laboratory $laboratory)
    {
        $laboratory->users()->update(['laboratory_id' => null]);

        $laboratory->delete();
        return redirect()->route('laboratory.index');
    }

    // import
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:csv,xlsx,xls',
        ]);

        $path = $request->file('file')->store('excel-files');
        $labos = (new FastExcel)->import(storage_path('app/' . $path));
        foreach ($labos as $labo) {
            Laboratory::create([
                'name' => $labo['Name'],
                'budget' => $labo['Budget'],
            ]);
        }

        return redirect()->route('laboratory.index');

    }

    // export
    public function export()
    {
        $labos = Laboratory::all();
        return (new FastExcel($labos))->download('labos.xlsx');
    }

}
