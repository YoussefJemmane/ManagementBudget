<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Service;

class ChartAppuiCentre extends Component
{
    public function render()
    {
        $budget = Service::where('execution_service', 'execute')->sum('frais_service');
        $publicationFraisSum = Service::where("type_service", "publication")->where('execution_service', 'execute')->sum('frais_service');
        $revisionFraisSum = Service::where("type_service", "revision")->where('execution_service', 'execute')->sum('frais_service');
        $traductionFraisSum = Service::where("type_service", "traduction")->where('execution_service', 'execute')->sum('frais_service');
        $PublicationCount = Service::where("type_service", "publication")->where('execution_service', 'execute')->count();
        $RevisionCount = Service::where("type_service", "revision")->where('execution_service', 'execute')->count();
        $TraductionCount = Service::where("type_service", "traduction")->where('execution_service', 'execute')->count();

        return view('livewire.chart-appui-centre', compact('budget', 'publicationFraisSum', 'revisionFraisSum', 'traductionFraisSum', 'PublicationCount', 'RevisionCount', 'TraductionCount'));
    }
}
