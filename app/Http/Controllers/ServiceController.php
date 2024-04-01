<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('services.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required',
            'intitule_article' => 'nullable',
            'intitule_journal' => 'nullable',
            'ISSN' => 'nullable',
            'Base_donnee_indexation' => 'nullable',
            'qualite_article' => 'nullable',
            'frais_service' => 'nullable',
            'validation_centre_appui' => 'nullable',
            'validation_directeur_labo' => 'nullable',
            'validation_enseignant' => 'nullable',
        ]);

        // if auth user is Enseignant then status is enseignant else doctorant
        $status = auth()->user()->role === 'Enseignant' ? 'enseignant' : 'doctorant';
        // if radio button named servise have value traduction then type_service is traduction and if publication then type_service is publication else revision
        $type_service = $request->service === 'traduction' ? 'traduction' : ($request->service === 'publication' ? 'publication' : 'revision');

        Service::create([
            'user_id' => auth()->id(),
            'titre' => $request->titre,
            'type_service' => $type_service,
            'status' => $status,
            'intitule_article' => $request->intitule_article,
            'intitule_journal' => $request->intitule_journal,
            'ISSN' => $request->ISSN,
            'Base_donnee_indexation' => $request->Base_donnee_indexation,
            'qualite_article' => $request->qualite_article,
            'frais_service' => $request->frais_service,
            'laboratory_id' => auth()->user()->laboratory_id,
            'validation_centre_appui' => 'pending',
            'validation_directeur_labo' => 'pending',
            'validation_enseignant' => 'pending',
        ]);

        return redirect()->route('services.index')->with('success', 'Service created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        return view('services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view('services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'titre' => 'required',
            'intitule_article' => 'nullable',
            'intitule_journal' => 'nullable',
            'ISSN' => 'nullable',
            'Base_donnee_indexation' => 'nullable',
            'qualite_article' => 'nullable',
            'frais_service' => 'nullable',
            'validation_centre_appui' => 'nullable',
            'validation_directeur_labo' => 'nullable',
            'validation_enseignant' => 'nullable',
        ]);

        $service->update([
            'titre' => $request->titre,
            'intitule_article' => $request->intitule_article,
            'intitule_journal' => $request->intitule_journal,
            'ISSN' => $request->ISSN,
            'Base_donnee_indexation' => $request->Base_donnee_indexation,
            'qualite_article' => $request->qualite_article,
            'frais_service' => $request->frais_service,
            'validation_centre_appui' => $request->validation_centre_appui,
            'validation_directeur_labo' => $request->validation_directeur_labo,
            'validation_enseignant' => $request->validation_enseignant,
        ]);

        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }

    // a method for adding a frais_service to a service
    public function addFraisService(Service $service)
    {
        
        $service->update([
            'frais_service' => request('frais_service'),
        ]);

        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('services.index')->with('success', 'Service deleted successfully.');
    }

    // Validation de Centre d'appui
    public function validationcentreappui(Service $service)
    {
        $service->update([
            'validation_centre_appui' => 'validate',
        ]);

        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }

    // Validation de Directeur de laboratoire
    public function validationdirecteurlabo(Service $service)
    {
        $service->update([
            'validation_directeur_labo' => 'validate',
        ]);

        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }

    // Validation de Enseignant
    public function validationenseignant(Service $service)
    {
        $service->update([
            'validation_enseignant' => 'validate',
        ]);

        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }

    // Execution de service
    public function executiondeservice(Service $service)
    {
        $service->update([
            'execution_service' => 'execute',
        ]);

        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }

    // Non Execution de service
    public function nonexecutiondeservice(Service $service)
    {
        $service->update([
            'execution_service' => 'non excecute',
        ]);
        // and the budget of the laboratory is decreased by the frais_service
        $service->laboratory->update([
            'budget' => $service->laboratory->budget - $service->frais_service,
        ]);

        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }

    // No validation de Centre d'appui
    public function novalidationcentreappui(Service $service)
    {
        $service->update([
            'validation_centre_appui' => 'non validate',
        ]);

        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }

    // No validation de Directeur de laboratoire
    public function novalidationdirecteurlabo(Service $service)
    {
        $service->update([
            'validation_directeur_labo' => 'non validate',
        ]);

        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }

    // No validation de Enseignant
    public function novalidationenseignant(Service $service)
    {
        $service->update([
            'validation_enseignant' => 'non validate',
        ]);

        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }
}
