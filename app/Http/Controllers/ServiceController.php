<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\ServiceStored;
use App\Notifications\ServiceValidated;
use App\Notifications\ServiceExecuted;
use Illuminate\Support\Facades\Storage;

use Barryvdh\DomPDF\Facade\Pdf;


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
            'article' => 'nullable',
            'lettre_acceptation' => 'nullable',
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
        ]);
        // if auth user is Enseignant then status is enseignant else doctorant
        $status = auth()->user()->role === 'Enseignant' ? 'enseignant' : 'doctorant';
        // if radio button named servise have value traduction then type_service is traduction and if publication then type_service is publication else revision
        $type_service = $request->service === 'traduction' ? 'traduction' : ($request->service === 'publication' ? 'publication' : 'revision');
        $article = $request->file('article')->store('public/services/articles');
        $lettre_acceptation = $request->hasFile('lettre_acceptation')
            ? $request->file('lettre_acceptation')->store('public/services/lettre_acceptations')
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
        $enseignant = User::Role('Enseignant')->first();

        // If the centre d'appui exists, send the notification
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
        // notify the directeur de laboratoire from laboratory_id of the auth user about the validation of the service ServiceValidatedByEnseignant
        $directeur = User::where('laboratory_id', auth()->user()->laboratory_id)->Role('Directeur de laboratoire')->first();

        // If the directeur exists, send the notification
        if ($directeur) {
            $directeur->notify(new ServiceValidated());
        }

        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }

    // Execution de service
    public function executiondeservice(Service $service)
    {
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

    public function generatepdf(Service $service)
    {
        $data=[
            'service'=>$service
        ];

        $pdf=Pdf::loadView('services.pdf',$data);

        return response()->streamDownload(function() use($pdf){
            echo $pdf->stream();
        },'service.pdf');
    }
}
