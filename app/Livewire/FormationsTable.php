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
            ->where('num_jour', 'like', '%' . $this->search . '%')
            ->orWhere('num_person', 'like', '%' . $this->search . '%')

            ->paginate(10);


        return view('livewire.formations-table', [
            'formations' => $formations
        ]);
    }
}
