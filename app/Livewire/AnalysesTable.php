<?php

namespace App\Livewire;

use App\Models\FormulaireAnalyse;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class AnalysesTable extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        $user = auth()->user();

        if (auth()->user()->hasRole('student')) {
            $analyses = FormulaireAnalyse::query()
                ->where('user_id', $user->id)
                ->paginate(10);
        } else {
            $analyses = FormulaireAnalyse::query()
                ->whereHas('user', function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%');
                })
                ->paginate(10);
        }

        return view('livewire.analyses-table', [
            'analyses' => $analyses
        ]);
    }
}
