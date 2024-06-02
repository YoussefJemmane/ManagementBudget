<?php

namespace App\Livewire;

use App\Models\Laboratory;
use Livewire\Component;

class ChartsBudget extends Component
{
    public function render()
    {
        $auth = auth()->user();
        $laboratory = $auth->laboratory;
        $budgetReste = $laboratory->budget;
        $first_budget = $laboratory->first_budget;
        $budgetUsed = $first_budget - $budgetReste;
        $services = $laboratory->services;
        $analyses = $laboratory->analyses;
        $depensesTraduction = $services->where('type_service', 'traduction')->where('execution_service', 'execute')->sum('frais_service');
        $depensesPublication = $services->where('type_service', 'publication')->where('execution_service', 'execute')->sum('frais_service');
        $depensesRevision = $services->where('type_service', 'revision')->where('execution_service', 'execute')->sum('frais_service');
        $depensesAnalyses = $analyses->where('execution_analyse', 'execute')->sum('prix_total');
        return view('livewire.charts-budget', compact('budgetReste', 'budgetUsed', 'first_budget', 'depensesTraduction', 'depensesPublication', 'depensesRevision', 'depensesAnalyses'));
    }
}
