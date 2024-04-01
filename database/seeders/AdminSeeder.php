<?php

namespace Database\Seeders;

use App\Models\Administrateur;
use App\Models\CentreAnalyse;
use App\Models\CentreAppui;
use App\Models\Directeur;
use App\Models\Enseignant;
use App\Models\Entreprise;
use App\Models\FormulaireFormation;
use App\Models\Laboratory;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create fake data to each user role
        $admin = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@uit.ac.ma',
            'password' => bcrypt('admin'),
            'cin' => 'EE123456',
            'phone' => '0612345678',
        ]);
        $admin->assignRole('Admin');

        $centreAppui = User::factory()->create([
            'name' => 'Centre d\'appui',
            'email' => 'centreappui@uit.ac.ma',
            'password' => bcrypt('centreappui'),
            'cin' => 'EE123456',
            'phone' => '0612345678',
        ]);
        $centreAppui->assignRole('Centre d\'appui');

        $poleRecherche = User::factory()->create([
            'name' => 'Pole de recherche',
            'email' => 'pole@uit.ac.ma',
            'password' => bcrypt('pole'),
            'cin' => 'EE123456',
            'phone' => '0612345678',
        ]);
        $poleRecherche->assignRole('Pole de recherche');

        $centreAnalyse = User::factory()->create([
            'name' => 'Centre d\'analyse',
            'email' => 'centreanalyse@uit.ac.ma',
            'password' => bcrypt('centreanalyse'),
            'cin' => 'EE123456',
            'phone' => '0612345678',
        ]);
        $centreAnalyse->assignRole('Centre d\'analyse');

        $etudiant = User::factory()->create([
            'name' => 'Etudiant',
            'email' => 'etudiant@uit.ac.ma',
            'password' => bcrypt('etudiant'),
            'cin' => 'EE123456',
            'phone' => '0612345678',
            'etablissement' => 'ENSA',
            'cne' => 'G123456',
            'date_inscription' => now(),
            'laboratory_id' => '1',

        ]);
        $etudiant->assignRole('Etudiant');

        $enseignant = User::factory()->create([
            'name' => 'Enseignant',
            'email' => 'enseignant@uit.ac.ma',
            'password' => bcrypt('enseignant'),
            'cin' => 'EE123456',
            'phone' => '0612345678',
            'etablissement' => 'ENSA',
            'laboratory_id' => '1',

        ]);
        $enseignant->assignRole('Enseignant');

        $directeur = User::factory()->create([
            'name' => 'Directeur de laboratoire',
            'email' => 'directeur@uit.ac.ma',
            'password' => bcrypt('directeur'),
            'cin' => 'EE123456',
            'phone' => '0612345678',
            'etablissement' => 'ENSA',
            'laboratory_id' => '1',
        ]);
        $directeur->assignRole('Directeur de laboratoire');

        $entreprise = User::factory()->create([
            'name' => 'Entreprise',
            'email' => 'maltemafrica@gmail.com',
            'password' => bcrypt('entreprise'),
            'cin' => 'EE123456',
            'phone' => '0612345678',
            'entreprise' => 'Maltem Africa',
        ]);
        $entreprise->assignRole('Entreprise');

    }

}
