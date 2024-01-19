<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'cne',
        'date_inscription',
        'ettablisement',
        'enseignant_id',
    ];

    // student  is a user from User table
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function enseignant()
    {
        return $this->belongsTo(Enseignant::class, 'enseignant_id');
    }
}
