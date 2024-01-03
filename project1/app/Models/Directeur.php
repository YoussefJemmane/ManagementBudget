<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Directeur extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
    ];

    // has many Users
    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    // a directeur is in one laboratory
    public function laboratory()
    {
        return $this->belongsTo(Laboratory::class,'laboratory_id');
    }
}
