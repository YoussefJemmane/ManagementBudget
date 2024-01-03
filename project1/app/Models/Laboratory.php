<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratory extends Model
{
    use HasFactory;
    protected $fillable = [
        'directeur_id',
    ];
    // one directeur is in this laboratory
    public function directeur()
    {
        return $this->hasOne(Directeur::class,'user_id');
    }
}
