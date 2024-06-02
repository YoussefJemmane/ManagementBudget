<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Laboratory;
use Livewire\WithPagination;

class LaboratoryTable extends Component
{
    use WithPagination;

    public $search = '';

    protected $queryString = ['search'];


    public function updatingSearch()
    {
        $this->resetPage();
    }



    public function render()
    {
        $laboratories = Laboratory::where('name', 'like', '%' . $this->search . '%')
            ->paginate(10);

        return view('livewire.laboratory-table', [
            'laboratories' => $laboratories
        ]);
    }
}
