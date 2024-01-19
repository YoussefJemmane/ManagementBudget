<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormulaireFormation extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'num_jour',
        'num_person',
        'entreprise_id',
        'validation_centre_analyse',
        'prix',
    ];
    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class, 'entreprise_id');
    }
}
