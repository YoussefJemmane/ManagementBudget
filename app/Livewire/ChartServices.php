<?php

namespace App\Livewire;

use App\Models\FormulairePublication;
use App\Models\FormulaireTraduction;
use App\Models\FormulaireRevision;
use Livewire\Component;

class ChartServices extends Component
{
    public $publicationCount;
    public $traductionCount;
    public $revisionCount;

    public function mount()
    {

        $this->publicationCount = FormulairePublication::count();
        $this->traductionCount = FormulaireTraduction::count();
        $this->revisionCount = FormulaireRevision::count();
    }

    public function render()
    {
        return view('livewire.chart-services', [
            'publicationCount' => $this->publicationCount,
            'traductionCount' => $this->traductionCount,
            'revisionCount' => $this->revisionCount,
        ]);
    }
}
