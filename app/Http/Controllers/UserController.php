<?php

namespace App\Http\Controllers;
use Rap2hpoutre\FastExcel\FastExcel;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Laboratory;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{


    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function create()
    {

        $roles = Role::all();
        // laboratories that are not assigned to any user that has the role 'Directeur de laboratoire'
        $laboratories = Laboratory::all();
        $users = User::all();
        return view('users.create', compact('roles', 'laboratories', 'users'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|ends_with:uit.ac.ma',
            'password' => 'required|string|min:8',
            'cin' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'etablissement' => 'nullable|string',
            'cne' => 'nullable|string|max:255',
            'date_inscription' => 'nullable|date',
            'entreprise' => 'nullable|string|max:255',
            'laboratory_id' => 'nullable|exists:laboratories,id',
            'role' => 'required|string',
            'enseignant' => 'nullable|string|max:255',
        ]);
        // update the roles to numbers then in each if statement we will add the role to $request->role


        if ($request->role == 1) {
            $user = User::create($request->only('name', 'email', 'password', 'cin', 'phone'));
            $request->role = 'Admin';
        }

        elseif ($request->role == 4) {
            $user = User::create($request->only('name', 'email', 'password', 'cin', 'phone'));
            $request->role = 'Centre d\'analyse';
        }

        elseif ($request->role == 3) {
            $user = User::create($request->only('name', 'email', 'password', 'cin', 'phone'));
            $request->role = 'Pole de recherche';
        }

        elseif ($request->role == 2) {
            $user = User::create($request->only('name', 'email', 'password', 'cin', 'phone'));
            $request->role = 'Centre d\'appui';
        }

        elseif ($request->role == 5) {
            $user = User::create($request->only('name', 'email', 'password', 'cin', 'phone', 'etablissement', 'cne', 'date_inscription', 'laboratory_id','enseignant'));
            $request->role = 'Etudiant';
        }

        elseif ($request->role == 6) {
            $user = User::create($request->only('name', 'email', 'password', 'cin', 'phone', 'etablissement', 'laboratory_id'));
            $request->role = 'Enseignant';
        }

        elseif ($request->role == 7) {
            $user = User::create($request->only('name', 'email', 'password', 'cin', 'phone', 'etablissement', 'laboratory_id'));
            $request->role = 'Directeur de laboratoire';
        }


        $role = Role::where('name', $request->role)->first();
        if ($role) {
            $user->assignRole($role);
        }

        return redirect()->route('users.index');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        $laboratories = Laboratory::all();
        $users = User::all();
        return view('users.edit', compact('user', 'roles', 'laboratories', 'users'));
    }
// update user
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|ends_with:uit.ac.ma',
            'password' => 'required|string|min:8',
            'cin' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'etablissement' => 'nullable|string',
            'cne' => 'nullable|string|max:255',
            'date_inscription' => 'nullable|date',
            'entreprise' => 'nullable|string|max:255',
            'laboratory_id' => 'nullable|exists:laboratories,id',
            'role' => 'required|string',
            'enseignant' => 'nullable|string|max:255',
        ]);

        if ($request->role == 1) {
            $user->update($request->only('name', 'email', 'password', 'cin', 'phone'));
            $request->role = 'Admin';
        } elseif ($request->role == 4) {
            $user->update($request->only('name', 'email', 'password', 'cin', 'phone'));
            $request->role = 'Centre d\'analyse';
        } elseif ($request->role == 3) {
            $user->update($request->only('name', 'email', 'password', 'cin', 'phone'));
            $request->role = 'Pole de recherche';
        } elseif ($request->role == 2) {
            $user->update($request->only('name', 'email', 'password', 'cin', 'phone'));
            $request->role = 'Centre d\'appui';
        } elseif ($request->role == 5) {
            $user->update($request->only('name', 'email', 'password', 'cin', 'phone', 'etablissement', 'cne', 'date_inscription', 'laboratory_id','enseignant'));
            $request->role = 'Etudiant';
        } elseif ($request->role == 6) {
            $user->update($request->only('name', 'email', 'password', 'cin', 'phone', 'etablissement', 'laboratory_id'));
            $request->role = 'Enseignant';
        } elseif ($request->role == 7) {
            $user->update($request->only('name', 'email', 'password', 'cin', 'phone', 'etablissement', 'laboratory_id'));
            $request->role = 'Directeur de laboratoire';
        }

        $role = Role::where('name', $request->role)->first();
        if ($role) {
            $user->syncRoles([$role]);
        }

        return redirect()->route('users.index');
    }
    // delete user
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }

    // createEntreprise
    public function createEntreprise()
    {
        return view('users.createEntreprise');
    }

    // storeEntreprise
    public function storeEntreprise(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8',
            'cin' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'entreprise' => 'required|string|max:255',
            'role' => 'Entreprise',
        ]);

        $user = User::create($request->only('name', 'email', 'password', 'cin', 'phone', 'entreprise'));

        $role = Role::where('name', 'Entreprise')->first();
        if ($role) {
            $user->assignRole($role);
        }

        return redirect()->route('dashboard');
    }

    // export users to excel
    public function export()
    {
        $users = User::all();
        return (new FastExcel($users))->download('users.xlsx');
    }

    // import users from excel
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:csv,xlsx,xls',
        ]);

        $path = $request->file('file')->store('excel-files');
        $users = (new FastExcel)->import(storage_path('app/' . $path));
        foreach ($users as $user) {


            $useradd = new User();
            $useradd->name = $user['Name'];
            $useradd->email = $user['Email'];
            $useradd->password = $user['Password'];
            $useradd->cin = $user['CIN'];
            $useradd->phone = $user['Phone'];
            $useradd->etablissement = $user['Etablissement'] ?? null;
            $useradd->cne = $user['CNE'] ?? null;
            $useradd->date_inscription = !empty($user['Date Inscription']) ? $user['Date Inscription'] : null;
            $useradd->entreprise = $user['Entreprise'] ?? null;
            $useradd->enseignant = $user['Enseignant'] ?? null;
            $laboratory = Laboratory::where('name', $user['Laboratory'])->first();
            if ($laboratory) {

                $useradd->laboratory_id = $laboratory->id;
            }
            $role = Role::where('name', $user['Role'])->first();
            if ($role) {
                $useradd->assignRole($role);
            }

            $useradd->save();



        }

        return redirect()->route('users.index');
    }

}
