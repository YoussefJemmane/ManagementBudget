<?php

namespace Database\Seeders;

use App\Models\Administrateur;
use App\Models\CentreAnalyse;
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
            'role' => 'admin',
            'cin' => 'EE111111',
            'phone' => '0611111111',
        ]);

        Administrateur::create([
            'user_id' => 1,
        ]);

        User::create([
            'name' => 'Directeur',
            'email' => 'directeur@gmail.com',
            'password' => bcrypt('directeur'),
            'role' => 'directeur',
            'cin' => 'EE111111',
            'phone' => '0611111111',
        ]);

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
            'role' => 'enseignant',
            'cin' => 'EE111111',
            'phone' => '0611111111',
        ]);

        Enseignant::create([
            'user_id' => 3,
            'laboratory_id' => 1,
            'ettablisement' => 'FSR',
        ]);

        User::create([
            'name' => 'student',
            'email' => 'student@gmail.com',
            'password' => bcrypt('student'),
            'role' => 'student',
            'cin' => 'EE111111',
            'phone' => '0611111111',
        ]);

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
            'role' => 'entreprise',
            'cin' => 'EE111111',
            'phone' => '0611111111',
        ]);

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
            'role' => 'centreanalyse',
            'cin' => 'EE111111',
            'phone' => '0611111111',
        ]);

        CentreAnalyse::create([
            'user_id' => 6,
        ]);
    }
}
