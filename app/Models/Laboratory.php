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
        'first_budget'
    ];
    // a user that have a role of 'Dirceteur de laboratoire' can be assigned to a laboratory
    public function users()
    {
        return $this->hasMany(User::class, 'laboratory_id');
    }

    public function students()
    {
        return $this->hasMany(User::class, 'laboratory_id')
//            i want to add a condition that the user role is 'Etudiant' the role is from Spatie package hasRoles
            ->whereHas('roles', function ($query) {
                $query->where('name', 'Etudiant');
            });
    }

    public function services()
    {
        return $this->hasMany(Service::class, 'laboratory_id');
    }

    public function analyses()
    {
        return $this->hasMany(FormulaireAnalyse::class, 'laboratory_id');
    }



}
