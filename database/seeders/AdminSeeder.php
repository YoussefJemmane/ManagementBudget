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
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'cin' => 'EE111111',
            'phone' => '0611111111',
        ])->assignRole('admin');

        Administrateur::create([
            'user_id' => 1,
        ]);

        User::create([
            'name' => 'Directeur',
            'email' => 'directeur@gmail.com',
            'password' => bcrypt('directeur'),
            'cin' => 'EE111111',
            'phone' => '0611111111',
        ])->assignRole('directeur');

        Directeur::create([
            'user_id' => 2,
        ]);

        Laboratory::create([
            'name' => 'Science',
            'budget' => 5000,
            'directeur_id' => 1,
        ]);

        User::create([
            'name' => 'Enseignant',
            'email' => 'enseignant@gmail.com',
            'password' => bcrypt('enseignant'),

            'cin' => 'EE111111',
            'phone' => '0611111111',
        ])->assignRole('enseignant');

        Enseignant::create([
            'user_id' => 3,
            'laboratory_id' => 1,
            'ettablisement' => 'FSR',
        ]);

        User::create([
            'name' => 'student',
            'email' => 'student@gmail.com',
            'password' => bcrypt('student'),

            'cin' => 'EE111111',
            'phone' => '0611111111',
        ])->assignRole('student');

        Student::create([
            'user_id' => 4,
            'cne' => 'G111111',
            'date_inscription' => '2021-01-01',
            'ettablisement' => 'FSR',
            'enseignant_id' => 1,
        ]);

        User::create([
            'name' => 'Entreprise',
            'email' => 'entreprise@gmail.com',
            'password' => bcrypt('entreprise'),

            'cin' => 'EE111111',
            'phone' => '0611111111',
        ])->assignRole('entreprise');

        Entreprise::create([
            'user_id' => 5,
            'entreprise' => 'Maltem Africa',
        ]);

        FormulaireFormation::create([
            'entreprise_id' => 1,
            'num_jour' => 1,
            'num_person' => 10,
            'prix' => 1000 * 10,
            'validation_centre_analyse' => "pending",
        ]);

        User::create([
            'name' => 'Centre d\'analyse',
            'email' => 'centreanalyse@gmail.com',
            'password' => bcrypt('centreanalyse'),

            'cin' => 'EE111111',
            'phone' => '0611111111',
        ])->assignRole('centreanalyse');

        CentreAnalyse::create([
            'user_id' => 6,
        ]);
        User::create([
            'name' => 'Centre d\'appui Gestion',
            'email' => 'centreappuigestion@gmail.com',
            'password' => bcrypt('centreappuigestion'),

            'cin' => 'EE111111',
            'phone' => '0611111111',
        ])->assignRole('centreappuiGestion');

        CentreAppui::create([
            'user_id' => 7,
        ]);
        User::create([
            'name' => 'Centre d\'appui Admin',
            'email' => 'centreappuiadmin@gmail.com',
            'password' => bcrypt('centreappuiadmin'),

            'cin' => 'EE111111',
            'phone' => '0611111111',
        ])->assignRole('centreappuiAdmin');

        CentreAppui::create([
            'user_id' => 8,
        ]);
    }
}
