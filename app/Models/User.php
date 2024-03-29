<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable ,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'cin',
        'phone',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function students()
    {
        return $this->hasMany(Student::class, 'user_id');
    }

    public function enseignants()
    {
        return $this->hasMany(Enseignant::class, 'user_id');
    }

    public function directeurs()
    {
        return $this->hasMany(Directeur::class, 'user_id');
    }

    public function entreprises()
    {
        return $this->hasMany(Entreprise::class, 'user_id');
    }
    public function centreanalyses()
    {
        return $this->hasMany(CentreAnalyse::class, 'user_id');
    }
    public function centreappuis()
    {
        return $this->hasMany(CentreAppui::class, 'user_id');
    }
}
