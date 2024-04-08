<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Laboratory;
class ChartsLaboratories extends Component
{
    
    public function generateUniqueColor(&$colors) {
        $color = 'rgba(' . mt_rand(0, 255) . ',' . mt_rand(0, 255) . ',' . mt_rand(0, 255) . ',255)';
        if (in_array($color, $colors)) {
            return $this->generateUniqueColor($colors);
        }
        $colors[] = $color;
        return $color;
    }
   
    public function render()
    {
        $laboratories = Laboratory::all();
        $laboratoryNames = $laboratories->pluck('name')->toArray();
        $laboratoryBudgets = $laboratories->pluck('budget')->toArray();
        $colors = [];
        foreach ($laboratories as $laboratory) {
            $color = $this->generateUniqueColor($colors);
            $colors[$laboratory->id] = $color;
        }
        
        return view('livewire.charts-laboratories', compact('laboratories', 'laboratoryNames', 'laboratoryBudgets', 'colors'));
    }
}
