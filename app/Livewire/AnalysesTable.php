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
        // dd the user role from Spatie
        
        if (auth()->user()->hasRole('Etudiant')) {
            $analyses = FormulaireAnalyse::query()
                ->where('user_id', $user->id)
                ->paginate(10);
        } 
        // if the role is Enseignant or Directeur de laboratoire must show only the analyses that related to the laboratory_id
        else if (auth()->user()->hasRole('Enseignant|Directeur de laboratoire')) {
            $analyses = FormulaireAnalyse::query()
                ->where('laboratory_id', $user->laboratory_id)
                ->paginate(10);
        }else {
            $analyses = FormulaireAnalyse::paginate(10);
        }

        return view('livewire.analyses-table', [
            'analyses' => $analyses
        ]);
    }
}
