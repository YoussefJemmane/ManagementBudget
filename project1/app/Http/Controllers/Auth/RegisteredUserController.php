<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Directeur;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        // options have an id and a role name
        $options = [
            ['id' => 1, 'role' => 'Directeur de Laboratoire'],
            ['id' => 2, 'role' => 'Etudiant'],
            ['id' => 3, 'role' => 'Administrateur'],
            ['id' => 4, 'role' => 'Centre d\'appui'],
            ['id' => 5, 'role' => 'Enseignant'],
        ];
        $disabled = false;
        return view('auth.register', compact('options', 'disabled'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {


        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'string'],
            'cin' => ['required', 'unique:'.User::class],

        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'cin' => $request->cin,
        ]);
        if ($request->role == 'Directeur de Laboratoire') {
            Directeur::create([
                'user_id' => $user->id,
            ]);
        }

        event(new Registered($user));


        return redirect(RouteServiceProvider::HOME);
    }
}
