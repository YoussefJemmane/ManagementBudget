<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Service;
use App\Models\FormulaireAnalyse;
use App\Models\Laboratory;

class ChartPole extends Component
{
    public function render()
    {
        $totalServices = Service::all()->count();
        $totalAnalyses = FormulaireAnalyse::all()->count();
        $budgetRest = Laboratory::sum('budget');
        $budget = Laboratory::sum('first_budget');
        $budgetDepense = $budget - $budgetRest;

        return view('livewire.chart-pole', compact('totalServices', 'totalAnalyses', 'budgetRest', 'budget', 'budgetDepense'));
    }
}
