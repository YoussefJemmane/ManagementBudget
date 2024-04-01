<?php

namespace App\Livewire;

use App\Models\Service;
use Livewire\Component;

class ChartServices extends Component
{
    public $publicationCount;
    public $traductionCount;
    public $revisionCount;

    public function mount()
    {

        $this->publicationCount = Service::where('type_service', 'publication')->count();
        $this->traductionCount = Service::where('type_service', 'traduction')->count();
        $this->revisionCount = Service::where('type_service', 'revision')->count();
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
