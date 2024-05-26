<?php

namespace App\Livewire;

use App\Models\User;
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

                    $services = Service::paginate(10);
                }
                elseif($role->name == 'Enseignant')
                {
                    $userName = $user->name;

                    // Get the services where the laboratory_id matches the user's laboratory_id and the enseignant matches the user's name
                    $services = Service::where('laboratory_id', $user->laboratory_id)
                        ->where('validation_centre_appui', 'validate')
                        ->whereHas('user', function ($query) use ($userName) {
                            $query->where('enseignant', $userName);
                        })
                        ->paginate(10);
                }
                elseif($role->name == 'Etudiant')
                {
                    $services = Service::where('user_id', $user->id)->paginate(10);
                }elseif($role->name == 'Pole de recherche')
                {
                    $services = Service::paginate(10);
                }elseif($role->name == 'Directeur de laboratoire')
                {
                    $services = Service::where('laboratory_id', $user->laboratory_id)->where('validation_enseignant', 'validate')->paginate(10);
                }
            }

        return view('livewire.services-table', compact('services'));

    }
}
