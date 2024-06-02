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
    public function users()
    {
        return $this->hasMany(User::class, 'laboratory_id');
    }

    public function students()
    {
        return $this->hasMany(User::class, 'laboratory_id')
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
