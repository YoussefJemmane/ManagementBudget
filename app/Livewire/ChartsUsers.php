<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class ChartsUsers extends Component
{
    public function render()
    {
        $enseignant = User::role('Enseignant')->count();
        $etudiant = User::role('Etudiant')->count();
        $admin = User::role('Admin')->count();
        $entreprise = User::role('Entreprise')->count();
        $centre_appui = User::role('Centre d\'appui')->count();
        $pole_recherche = User::role('Pole de recherche')->count();
        $centre_analyse = User::role('Centre d\'analyse')->count();
        $directeur_laboratoire = User::role('Directeur de laboratoire')->count();
        
        
        return view('livewire.charts-users', compact('enseignant', 'etudiant', 'admin', 'entreprise', 'centre_appui', 'pole_recherche', 'centre_analyse', 'directeur_laboratoire'));
    }
}
