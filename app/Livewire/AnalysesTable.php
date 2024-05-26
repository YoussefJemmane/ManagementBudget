<?php

namespace App\Livewire;

use App\Models\FormulaireAnalyse;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class AnalysesTable extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        $user = auth()->user();

        foreach($user->roles as $role) {
            if($role->name == 'Centre d\'analyse') {
                $analyses = FormulaireAnalyse::where('validation_enseignant', 'validate')
                    ->where('validation_directeur_labo', 'validate')
                    ->paginate(10);
            } elseif($role->name == 'Enseignant') {
                $userName = $user->name;

                $analyses = FormulaireAnalyse::where('laboratory_id', $user->laboratory_id)
                    ->whereHas('user', function ($query) use ($userName) {
                        $query->where('enseignant', $userName);
                    })
                    ->paginate(10);
            } elseif($role->name == 'Etudiant') {
                $analyses = FormulaireAnalyse::where('user_id', $user->id)
                    ->paginate(10);
            } elseif($role->name == 'Pole de recherche') {
                $analyses = FormulaireAnalyse::paginate(10);
            } elseif($role->name == 'Directeur de laboratoire') {
                $analyses = FormulaireAnalyse::where('laboratory_id', $user->laboratory_id)
                    ->where('validation_enseignant', 'validate')
                    ->paginate(10);
            }
        }

        return view('livewire.analyses-table', [
            'analyses' => $analyses
        ]);
    }
}
