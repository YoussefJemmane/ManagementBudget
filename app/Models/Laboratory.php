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
    ];
    // a user that have a role of 'Dirceteur de laboratoire' can be assigned to a laboratory
    public function users()
    {
        return $this->hasMany(User::class, 'laboratory_id');
    }
   


}
