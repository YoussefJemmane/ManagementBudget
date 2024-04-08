<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Contracts\Auth\MustVerifyEmail;


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
        'etablissement',
        'cne',
        'date_inscription',
        'entreprise',
        'laboratory_id',
        'enseignant'
        
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
    /**
     * Validation rules for user creation/update
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                function ($attribute, $value, $fail) {
                    // Check if the user's role is Entreprise
                    if ($this->assignRole('Entreprise')) {
                        return; // Allow any email for users with role Entreprise
                    }
    
                    // For other roles, validate the email domain
                    if (!ends_with($value, 'uit.ac.ma')) {
                        return $fail('The email must end with uit.ac.ma.');
                    }
                },
                'unique:users',
            ],
            'password' => 'required|string|min:8|confirmed',
            'cin' => 'required|string|max:255', 
            'phone' => 'required|string|max:255', 
            'etablissement' => 'nullable|string|max:255', 
            'cne' => 'nullable|string|max:255', 
            'date_inscription' => 'nullable|date', 
            'entreprise' => 'nullable|string|max:255', 
            'laboratory_id' => 'nullable|exists:laboratories,id',
        ];
    }

    /**
     * a user that have a role of 'Dirceteur de laboratoire' can be assigned to a laboratory
     */
    public function laboratory()
    {
        return $this->belongsTo(Laboratory::class, 'laboratory_id');
    }

    /**
     * a user have a role Entreprise have many formations
     */
    public function formations()
    {
        return $this->hasMany(FormulaireFormation::class, 'user_id');
    }
    
    
}
