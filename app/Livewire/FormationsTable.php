<?php

namespace App\Livewire;

use App\Models\FormulaireFormation;
use Livewire\Component;

class FormationsTable extends Component
{
    public $search;

    public function render()
    {
        $formations = FormulaireFormation::query()
            ->whereHas('entreprise', function ($query) {
                $query->where('entreprise', 'like', '%' . $this->search . '%');
            })
            ->get();


        return view('livewire.formations-table', [
            'formations' => $formations
        ]);
    }
}
