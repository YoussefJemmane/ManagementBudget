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
        'user_id',
        'validation_centre_analyse',
        'prix',
    ];
    // a user have a role Entreprise have many formations
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
