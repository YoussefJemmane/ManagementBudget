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

            foreach($user->roles as $role)
            {
                if($role->name == 'Centre d\'appui')
                {
                    //  add a condition the the role is Centre appui and the validation_enseignant from service table and validation_directeur_labo is == "validate"
                    $services = Service::where('validation_enseignant', 'validate')->where('validation_directeur_labo', 'validate')->paginate(10);
                }
                elseif($role->name == 'Enseignant')
                {
                    $services = Service::where('laboratory_id', $user->laboratory_id)->paginate(10);
                }
                elseif($role->name == 'Etudiant')
                {
                    $services = Service::where('user_id', $user->id)->paginate(10);
                }elseif($role->name == 'Admin')
                {
                    $services = Service::paginate(10);
                }elseif($role->name == 'Directeur de laboratoire')
                {
                    $services = Service::where('laboratory_id', $user->laboratory_id)->paginate(10)->where('validation_enseignant', 'validate');
                }
            }

        return view('livewire.services-table', compact('services'));
       
    }
}
