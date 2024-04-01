<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Service;

class ServicesTable extends Component
{
    use WithPagination;
    public $search;
    public function render()
    {
        
        $user = auth()->user();
        
        if($user->hasRole('Admin|Centre d\'appui')){
            $services = Service::paginate(10);
        }else{
            $services = Service::where('laboratory_id', $user->laboratory_id)->paginate(10);
        }

        return view('livewire.services-table', compact('services'));
       
    }
}
