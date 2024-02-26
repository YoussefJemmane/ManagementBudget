<?php

namespace App\Livewire;

use App\Models\FormulaireTraduction;
use Livewire\Component;
use Livewire\WithPagination;

class TraductionTable extends Component
{
    use WithPagination;
    public $search;
    public function render()
    {
        $user = auth()->user();
        if (auth()->user()->hasRole('student')) {
            $traductions = FormulaireTraduction::query()
                ->where('user_id',$user->id)
                ->paginate(10);
        } else {
            $traductions = FormulaireTraduction::query()
                ->whereHas('user',function ($query){
                    $query->where('name','like','%' . $this->search . '%');
                })
                ->paginate(10);
        }
        return view('livewire.traduction-table',
        [
            'traductions' => $traductions
        ]

        );
    }
}
