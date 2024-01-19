<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratory extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'budget',
        'directeur_id',
    ];

    public function directeur()
    {
        return $this->belongsTo(Directeur::class, 'directeur_id');
    }

    public function enseignants()
    {
        return $this->hasMany(Enseignant::class, 'laboratory_id');
    }


}
