<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormulaireAnalyse extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'designantion',
        'description',
        'mode_facturation',
        'prix_unitaire',
        'quantite',
        'prix_total',
        'laboratory_id',
        'validation_centre_analyse',
        'validation_directeur_labo',
        'validation_enseignant',
        'execution_analyse',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
