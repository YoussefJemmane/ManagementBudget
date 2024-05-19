<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
        "titre",
        "type_service",
        "status",
        "intitule_article",
        "intitule_journal",
        "ISSN",
        "base_donne_indexation",
        "qualite_article",
        "frais_service",
        "laboratory_id",
        "article",
        "lettre_acceptation",
        'execution_service',
        "validation_centre_appui",
        "validation_directeur_labo",
        "validation_enseignant",
    ];

    public function laboratory()
    {
        return $this->belongsTo(Laboratory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
