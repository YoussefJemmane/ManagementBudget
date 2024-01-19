<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormulaireTraduction extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'prix',
        'validation_centre_appui',
        'validation_directeur_labo',
        'validation_enseignant',
        'laboratory_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function laboratory()
    {
        return $this->belongsTo(Laboratory::class, 'laboratory_id');
    }

}
