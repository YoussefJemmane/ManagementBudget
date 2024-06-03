<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Notifications\ServiceRefuser;
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\ServiceStored;
use App\Notifications\ServiceValidated;
use App\Notifications\ServiceExecuted;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;
use Rap2hpoutre\FastExcel\FastExcel;
use Illuminate\Support\Facades\Auth;

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
            'article' => 'nullable|file|mimes:doc,docx,pdf',
            'lettre_acceptation' => 'nullable|file|mimes:pdf',
            'devis_journal' => 'nullable|file|mimes:pdf',
            'ISSN' => 'nullable',
            'base_donne_indexation' => 'nullable',
            'qualite_article' => 'nullable',
            'frais_service' => 'nullable',
            'validation_centre_appui' => 'nullable',
            'validation_directeur_labo' => 'nullable',
            'validation_enseignant' => 'nullable',

        ]);

        $status = auth()->user()->role === 'Enseignant' ? 'enseignant' : 'doctorant';
        $type_service = $request->service === 'traduction' ? 'traduction' : ($request->service === 'publication' ? 'publication' : 'revision');

        $article = $request->file('article')->store('public/services/articles');
        $lettre_acceptation = $request->hasFile('lettre_acceptation')
            ? $request->file('lettre_acceptation')->store('public/services/lettre_acceptations')
            : null;
        $devis_journal = $request->hasFile('devis_journal')
            ? $request->file('devis_journal')->store('public/services/devis_journals')
            : null;
        $service = Service::create([
            'user_id' => auth()->id(),
            'titre' => $request->titre,
            'type_service' => $type_service,
            'status' => $status,
            'intitule_article' => $request->intitule_article,
            'intitule_journal' => $request->intitule_journal,
            'ISSN' => $request->ISSN,
            'base_donne_indexation' => $request->base_donne_indexation,
            'qualite_article' => $request->qualite_article,
            'frais_service' => $request->frais_service,
            'laboratory_id' => auth()->user()->laboratory_id,
            'article' => $article,
            'lettre_acceptation' => $lettre_acceptation,
            'devis_journal' => $devis_journal,
            'validation_centre_appui' => 'pending',
            'validation_directeur_labo' => 'pending',
            'validation_enseignant' => 'pending',
        ]);

        $centreAppui = User::Role('Centre d\'appui')->first();

        // If the centre d'appui exists, send the notification
        if ($centreAppui) {
            $centreAppui->notify(new ServiceStored());
        }

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
            'base_donne_indexation' => 'nullable',
            'qualite_article' => 'nullable',
            'frais_service' => 'nullable',
            'validation_centre_appui' => 'nullable',
            'validation_directeur_labo' => 'nullable',
            'validation_enseignant' => 'nullable',
            'article' => 'nullable',

            'lettre_acceptation' => 'nullable',
            'devis_journal' => 'nullable',
        ]);
        // if auth user is Enseignant then status is enseignant else doctorant
        $status = auth()->user()->role === 'Enseignant' ? 'enseignant' : 'doctorant';
        // if radio button named servise have value traduction then type_service is traduction and if publication then type_service is publication else revision
        $type_service = $request->service === 'traduction' ? 'traduction' : ($request->service === 'publication' ? 'publication' : 'revision');
        $article = $request->file('article')->store('public/services/articles');
        $lettre_acceptation = $request->hasFile('lettre_acceptation')
            ? $request->file('lettre_acceptation')->store('public/services/lettre_acceptations')
            : null;
        $devis_journal = $request->hasFile('devis_journal')
            ? $request->file('devis_journal')->store('public/services/devis_journals')
            : null;
        $service->update([

            'titre' => $request->titre,
            'type_service' => $type_service,
            'status' => $status,
            'intitule_article' => $request->intitule_article,
            'intitule_journal' => $request->intitule_journal,
            'ISSN' => $request->ISSN,
            'base_donne_indexation' => $request->base_donne_indexation,
            'qualite_article' => $request->qualite_article,
            'frais_service' => $request->frais_service,
            'laboratory_id' => auth()->user()->laboratory_id,
            'article' => $article,
            'lettre_acceptation' => $lettre_acceptation,
            'devis_journal' => $devis_journal,
            'validation_centre_appui' => 'pending',
            'validation_directeur_labo' => 'pending',
            'validation_enseignant' => 'pending',
        ]);

        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }

    // a method for adding a frais_service to a service
    public function addFraisService(Service $service)
    {

        $service->update([
            'frais_service' => request('frais_service'),
            'validation_directeur_labo' => 'pending',
            'validation_enseignant' => 'pending',
        ]);

        // notify the directeur and the enseignant that the service has been updated
        $directeur = User::where('laboratory_id', auth()->user()->laboratory_id)->Role('Directeur de laboratoire')->first();
        $enseignant = User::Role('Enseignant')->first();

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

        $user = $service->user;
        $enseignantName = $user->enseignant;

        $enseignant = User::where('name', $enseignantName)->first();
        if ($enseignant) {
            $enseignant->notify(new ServiceValidated());
        }
        $service->update([
            'validation_centre_appui' => 'validate',
            'execution_service' => 'pending',
        ]);

        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }

    // Validation de Directeur de laboratoire
    public function validationdirecteurlabo(Service $service)
    {
        $service->update([
            'validation_directeur_labo' => 'validate',
        ]);

        // notify the centre d'appui there is no need to get the centre d'appui from the database because the centre d'appui is the user with the role of Centre d'appui
        $centreAppui = User::Role('Centre d\'appui')->first();

        // If the centre d'appui exists, send the notification
        if ($centreAppui) {
            $centreAppui->notify(new ServiceValidated());
        }
        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }

    // Validation de Enseignant
    public function validationenseignant(Service $service)
    {
        $service->update([
            'validation_enseignant' => 'validate',
        ]);

        $directeur = User::where('laboratory_id', auth()->user()->laboratory_id)->Role('Directeur de laboratoire')->first();


        if ($directeur) {
            $directeur->notify(new ServiceValidated());
        }

        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }

    // Execution de service
    public function executiondeservice(Request $request,Service $service)
    {
        if ($service->laboratory->budget < $service->frais_service) {
            $newBudget = $service->laboratory->budget - $service->frais_service;

            $validator = Validator::make(['budget' => $newBudget], [
                'budget' => 'gte:0',
            ], [
                'budget.min' => 'The laboratory does not have enough budget to execute this service.',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }
        }
        if ($service->laboratory->budget >= $service->frais_service) {

        $service->update([
            'execution_service' => 'execute',
        ]);

        // here you will get the budget of the laboratory that the user_id of the service belongs to and decrease the budget by the frais_service
        $service->laboratory->update([
            'budget' => $service->laboratory->budget - $service->frais_service,
        ]);

        // notify the user that the service has been executed
        $service->user->notify(new ServiceExecuted());

        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }
    }

    // Non Execution de service
    public function pendingservice(Service $service)
    {
        $service->update([
            'execution_service' => 'pending',
        ]);
        // if i hit this after the execution already done i will increase the budget of the laboratory by the frais_service
        $service->laboratory->update([
            'budget' => $service->laboratory->budget + $service->frais_service,
        ]);
        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }

    // No validation de Centre d'appui
    public function novalidationcentreappui(Service $service)
    {
        $service->update([
            'validation_centre_appui' => 'non validate',
        ]);

        $user = $service->user;

        $user->notify(new \App\Notifications\ServiceRefuser());

        $enseignantName = $user->enseignant;

        $enseignant = User::where('name', $enseignantName)->first();

        if ($enseignant) {
            $enseignant->notify(new \App\Notifications\ServiceRefuser());
        }

        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }

    // No validation de Directeur de laboratoire
    public function novalidationdirecteurlabo(Service $service)
    {
        $service->update([
            'validation_directeur_labo' => 'non validate',
        ]);

        $user = $service->user;

        $user->notify(new \App\Notifications\ServiceRefuser());


        $centreAppui = User::Role('Centre d\'appui')->first();

        if ($centreAppui) {
            $centreAppui->notify(new \App\Notifications\ServiceRefuser());
        }

        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }

    // No validation de Enseignant
    public function novalidationenseignant(Service $service)
    {
        $service->update([
            'validation_enseignant' => 'non validate',
        ]);

        $user = $service->user;

        $user->notify(new \App\Notifications\ServiceRefuser());

        $laboratory = $user->laboratory;

        $directeur = User::where('laboratory_id', $laboratory->id)->Role('Directeur de laboratoire')->first();



        if ($directeur) {
            $directeur->notify(new \App\Notifications\ServiceRefuser());
        }

        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }
    public function downloadArticle(Service $service)
    {
        $file = Storage::disk('public/services/articles')->get($service->article);
        return response()->download(storage_path('app/' . $service->article));
    }
    public function downloadLettreAcceptation(Service $service)
    {
        $file = Storage::disk('public/services/lettre_acceptations')->get($service->lettre_acceptation);
        return response()->download(storage_path('app/' . $service->lettre_acceptation));
    }
    public function downloadDevisJournal(Service $service)
    {
        $file = Storage::disk('public/services/devis_journals')->get($service->devis_journal);
        return response()->download(storage_path('app/' . $service->devis_journal));
    }

    public function generatepdf(Service $service)
    {
        $data = [
            'service' => $service
        ];

        $pdf = Pdf::loadView('services.pdf', $data);

        return $pdf->download('service.pdf');
    }
    public function export(Request $request)
    {
        $user = Auth::user();

        if ($user->hasRole('Directeur de laboratoire')) {
            $services = Service::where('laboratory_id', $user->laboratory_id)->get();
        } else {
            $services = Service::all();
        }

        $data = $services->map(function ($service) use ($user) {
            $row = [
                'Nom de la benificeur' => $service->user->name,
                'Type de service' => $service->type_service,
                'Frais du service' => $service->frais_service,
            ];

            if ($user->hasRole('Directeur de laboratoire')) {
                $row['Validation de Directeur de Laboratoire'] = $service->validation_directeur_labo;
            }

            if ($user->hasRole('Centre d\'appui')) {
                $row['Validation de Centre d\'appui'] = $service->validation_centre_appui;
                $row['Execution de Service'] = $service->execution_service;
            }


            return $row;
        });

        return (new FastExcel($data))->download('services.xlsx');
    }
}
