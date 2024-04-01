<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FormulairePublication;
use App\Models\FormulaireTraduction;
use App\Models\FormulaireRevision;
class Services extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // make fake data to all the services Publications, Traductions, Revisions tables

        // Publications
        $publications = [
            [
                'user_id' => 1,
                'status' => 'doctorant',
                'intitule_article' => 'Article 1',
                'intitule_journal' => 'Journal 1',
                'ISSN' => 'ISSN 1',
                'Base_donnee_indexation' => 'Base 1',
                'qualite_article' => 'Qualite 1',
                'frais_service' => 100,
                'validation_centre_appui' => 'pending',
                'validation_directeur_labo' => 'pending',
                'validation_enseignant' => 'pending',
            ],
            [
                'user_id' => 2,
                'status' => 'enseignant',
                'intitule_article' => 'Article 2',
                'intitule_journal' => 'Journal 2',
                'ISSN' => 'ISSN 2',
                'Base_donnee_indexation' => 'Base 2',
                'qualite_article' => 'Qualite 2',
                'frais_service' => 200,
                'validation_centre_appui' => 'pending',
                'validation_directeur_labo' => 'pending',
                'validation_enseignant' => 'pending',
            ],
        ];

        foreach ($publications as $publication) {
            FormulairePublication::create($publication);
        }

        // Traductions
        $traductions = [
            [
                'user_id' => 1,
                'status' => 'doctorant',
                'frais_du_service' => 100,
                'validation_centre_appui' => 'pending',
                'validation_directeur_labo' => 'pending',
                'validation_enseignant' => 'pending',
            ],
            [
                'user_id' => 2,
                'status' => 'enseignant',
                'frais_du_service' => 200,
                'validation_centre_appui' => 'pending',
                'validation_directeur_labo' => 'pending',
                'validation_enseignant' => 'pending',
            ],
        ];

        foreach ($traductions as $traduction) {
            FormulaireTraduction::create($traduction);
        }

        // Revisions

        $revisions = [
            [
                'user_id' => 1,
                'status' => 'doctorant',
                'frais_du_service' => 100,
                'validation_centre_appui' => 'pending',
                'validation_directeur_labo' => 'pending',
                'validation_enseignant' => 'pending',
            ],
            [
                'user_id' => 2,
                'status' => 'enseignant',
                'frais_du_service' => 200,
                'validation_centre_appui' => 'pending',
                'validation_directeur_labo' => 'pending',
                'validation_enseignant' => 'pending',
            ],
        ];

        foreach ($revisions as $revision) {
            FormulaireRevision::create($revision);
        }


    }
}
