<?php

namespace App\Livewire;

use App\Models\FormulaireAnalyse;
use Livewire\Component;

class ChartAnalyses extends Component
{
    public $analyses_chimiques;
    public $spectroscopie;
    public $spectrometrie;
    public $microscopie;
    public $cristallographie;
    public $analyses_environnementales;

    public function mount()
    {
        $this->analyses_chimiques = FormulaireAnalyse::where('designantion', "Analyses chimiques par chromatographie")->count();
        $this->spectroscopie = FormulaireAnalyse::where('designantion', "Spectroscopie")->count();
        $this->spectrometrie = FormulaireAnalyse::where('designantion', "Spectrometrie")->count();
        $this->microscopie = FormulaireAnalyse::where('designantion', "Microscopie")->count();
        $this->cristallographie = FormulaireAnalyse::where('designantion', "Cristallographie")->count();
        $this->analyses_environnementales = FormulaireAnalyse::where('designantion', "Analyses environnementales")->count();
    }

    public function render()
    {
        return view('livewire.chart-analyses', [
            'analyses_chimiques' => $this->analyses_chimiques,
            'spectroscopie' => $this->spectroscopie,
            'spectrometrie' => $this->spectrometrie,
            'microscopie' => $this->microscopie,
            'cristallographie' => $this->cristallographie,
            'analyses_environnementales' => $this->analyses_environnementales,

        ]);
    }
}
