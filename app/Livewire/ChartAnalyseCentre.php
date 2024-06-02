<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\FormulaireAnalyse;

class ChartAnalyseCentre extends Component
{
    public $analyses_chimiques;
    public $spectroscopie;
    public $spectrometrie;
    public $microscopie;
    public $cristallographie;
    public $analyses_environnementales;
    public $budget;
    public $analysesChimiqueFraisSum;
    public $spectroscopieFraisSum;
    public $spectrometrieFraisSum;
    public $microscopieFraisSum;
    public $cristallographieFraisSum;
    public $analysesEnvironnementalesFraisSum;


    public function mount()
    {
        $this->budget = FormulaireAnalyse::where("execution_analyse", "execute")->sum('prix_total');
        $this->analysesChimiqueFraisSum = FormulaireAnalyse::where('designantion', "Analyses chimiques par chromatographie")->where("execution_analyse", "execute")->sum('prix_total');
        $this->spectroscopieFraisSum = FormulaireAnalyse::where('designantion', "Spectroscopie")->where("execution_analyse", "execute")->sum('prix_total');
        $this->spectrometrieFraisSum = FormulaireAnalyse::where('designantion', "Spectrometrie")->where("execution_analyse", "execute")->sum('prix_total');
        $this->microscopieFraisSum = FormulaireAnalyse::where('designantion', "Microscopie")->where("execution_analyse", "execute")->sum('prix_total');
        $this->cristallographieFraisSum = FormulaireAnalyse::where('designantion', "Cristallographie")->where("execution_analyse", "execute")->sum('prix_total');
        $this->analysesEnvironnementalesFraisSum = FormulaireAnalyse::where('designantion', "Analyses environnementales")->where("execution_analyse", "execute")->sum('prix_total');
        $this->analyses_chimiques = FormulaireAnalyse::where('designantion', "Analyses chimiques par chromatographie")->count();
        $this->spectroscopie = FormulaireAnalyse::where('designantion', "Spectroscopie")->count();
        $this->spectrometrie = FormulaireAnalyse::where('designantion', "Spectrometrie")->count();
        $this->microscopie = FormulaireAnalyse::where('designantion', "Microscopie")->count();
        $this->cristallographie = FormulaireAnalyse::where('designantion', "Cristallographie")->count();
        $this->analyses_environnementales = FormulaireAnalyse::where('designantion', "Analyses environnementales")->count();
    }
    public function render()
    {

        return view('livewire.chart-analyse-centre');
    }
}
