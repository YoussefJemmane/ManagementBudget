<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Service;
use App\Models\FormulaireAnalyse;
use App\Models\Laboratory;
class ChartsFluxBudget extends Component
{
    public function render()
    {
        $executedServices = Service::where('execution_service','execute')->get();
        $fraisServices = $executedServices->sum('frais_service');
        $executedAnalyse = FormulaireAnalyse::where('execution_analyse','execute')->get();
        $fraisAnalyse = $executedAnalyse->sum('prix_total');
        $laboratories = Laboratory::all();
        $laboratoriesReste = $laboratories->sum('budget');
        return view('livewire.charts-fluxBudget', compact('fraisServices','fraisAnalyse','laboratoriesReste'));
    }
}
