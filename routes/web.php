<?php

use App\Http\Controllers\AdministrateurController;
use App\Http\Controllers\CentreAnalyseController;
use App\Http\Controllers\CentreAppuiController;
use App\Http\Controllers\DirecteurController;
use App\Http\Controllers\EnseignantController;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\FormulaireAnalyseController;
use App\Http\Controllers\FormulaireFormationController;
use App\Http\Controllers\FormulairePublicationController;
use App\Http\Controllers\FormulaireRevisionController;
use App\Http\Controllers\FormulaireTraductionController;
use App\Http\Controllers\LaboratoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;

use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', function () {
            $users = User::all();
            $roles = $users->pluck('role')->toArray();
            return view('users.index', compact('users'));
        })->name('users.index');

        Route::get('/edit/{id}', function ($id) {
            $user = User::find($id);
            $role = $user->role;
            $view = in_array($role, ['student', 'directeur', 'enseignant', 'centreappui', 'centreanalyse', 'entreprise', 'admin'])
                ? $role
                : 'default';
            return redirect()->route("$view.edit", [$view => $id]);
        })->name('users.edit');

        Route::get('/show/{id}', function ($id) {
            $user = User::find($id);
            dd($user);
        })->name('users.show');

        Route::get('/delete/{id}', function ($id) {
            $user = User::find($id);
            dd($user);
        })->name('users.destroy');
    });



    Route::group(['middleware' => 'auth'], function () {
        Route::get('/student', [StudentController::class, 'index'])->name('student.index');
        Route::get('/student/create', [StudentController::class, 'create'])->name('student.create');
        Route::post('/student', [StudentController::class, 'store'])->name('student.store');
        Route::get('/student/{student}', [StudentController::class, 'show'])->name('student.show');
        Route::get('/student/{student}/edit', [StudentController::class, 'edit'])->name('student.edit');
        Route::put('/student/{student}', [StudentController::class, 'update'])->name('student.update');
        Route::delete('/student/{student}', [StudentController::class, 'destroy'])->name('student.destroy');
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/admin', [AdministrateurController::class, 'index'])->name('admin.index');
        Route::get('/admin/create', [AdministrateurController::class, 'create'])->name('admin.create');
        Route::post('/admin', [AdministrateurController::class, 'store'])->name('admin.store');
        Route::get('/admin/{admin}', [AdministrateurController::class, 'show'])->name('admin.show');
        Route::get('/admin/{admin}/edit', [AdministrateurController::class, 'edit'])->name('admin.edit');
        Route::put('/admin/{admin}', [AdministrateurController::class, 'update'])->name('admin.update');
        Route::delete('/admin/{admin}', [AdministrateurController::class, 'destroy'])->name('admin.destroy');
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/directeur', [DirecteurController::class, 'index'])->name('directeur.index');
        Route::get('/directeur/create', [DirecteurController::class, 'create'])->name('directeur.create');
        Route::post('/directeur', [DirecteurController::class, 'store'])->name('directeur.store');
        Route::get('/directeur/{directeur}', [DirecteurController::class, 'show'])->name('directeur.show');
        Route::get('/directeur/{directeur}/edit', [DirecteurController::class, 'edit'])->name('directeur.edit');
        Route::put('/directeur/{directeur}', [DirecteurController::class, 'update'])->name('directeur.update');
        Route::delete('/directeur/{directeur}', [DirecteurController::class, 'destroy'])->name('directeur.destroy');
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/enseignant', [EnseignantController::class, 'index'])->name('enseignant.index');
        Route::get('/enseignant/create', [EnseignantController::class, 'create'])->name('enseignant.create');
        Route::post('/enseignant', [EnseignantController::class, 'store'])->name('enseignant.store');
        Route::get('/enseignant/{enseignant}', [EnseignantController::class, 'show'])->name('enseignant.show');
        Route::get('/enseignant/{enseignant}/edit', [EnseignantController::class, 'edit'])->name('enseignant.edit');
        Route::put('/enseignant/{enseignant}', [EnseignantController::class, 'update'])->name('enseignant.update');
        Route::delete('/enseignant/{enseignant}', [EnseignantController::class, 'destroy'])->name('enseignant.destroy');
    });


    Route::group(['middleware' => 'auth'], function () {
        Route::get('/laboratory', [LaboratoryController::class, 'index'])->name('laboratory.index');
        Route::get('/laboratory/create', [LaboratoryController::class, 'create'])->name('laboratory.create');
        Route::post('/laboratory', [LaboratoryController::class, 'store'])->name('laboratory.store');
        Route::get('/laboratory/{laboratory}', [LaboratoryController::class, 'show'])->name('laboratory.show');
        Route::get('/laboratory/{laboratory}/edit', [LaboratoryController::class, 'edit'])->name('laboratory.edit');
        Route::put('/laboratory/{laboratory}', [LaboratoryController::class, 'update'])->name('laboratory.update');
        Route::delete('/laboratory/{laboratory}', [LaboratoryController::class, 'destroy'])->name('laboratory.destroy');
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/centreappui', [CentreAppuiController::class, 'index'])->name('centreappui.index');
        Route::get('/centreappui/create', [CentreAppuiController::class, 'create'])->name('centreappui.create');
        Route::post('/centreappui', [CentreAppuiController::class, 'store'])->name('centreappui.store');
        Route::get('/centreappui/{centreappui}', [CentreAppuiController::class, 'show'])->name('centreappui.show');
        Route::get('/centreappui/{centreappui}/edit', [CentreAppuiController::class, 'edit'])->name('centreappui.edit');
        Route::put('/centreappui/{centreappui}', [CentreAppuiController::class, 'update'])->name('centreappui.update');
        Route::delete('/centreappui/{centreappui}', [CentreAppuiController::class, 'destroy'])->name('centreappui.destroy');
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/centreanalyse', [CentreAnalyseController::class, 'index'])->name('centreanalyse.index');
        Route::get('/centreanalyse/create', [CentreAnalyseController::class, 'create'])->name('centreanalyse.create');
        Route::post('/centreanalyse', [CentreAnalyseController::class, 'store'])->name('centreanalyse.store');
        Route::get('/centreanalyse/{centreanalyse}', [CentreAnalyseController::class, 'show'])->name('centreanalyse.show');
        Route::get('/centreanalyse/{centreanalyse}/edit', [CentreAnalyseController::class, 'edit'])->name('centreanalyse.edit');
        Route::put('/centreanalyse/{centreanalyse}', [CentreAnalyseController::class, 'update'])->name('centreanalyse.update');
        Route::delete('/centreanalyse/{centreanalyse}', [CentreAnalyseController::class, 'destroy'])->name('centreanalyse.destroy');
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/formulaireanalyse', [FormulaireAnalyseController::class, 'index'])->name('formulaireanalyse.index');
        Route::get('/formulaireanalyse/listanalyeses', [FormulaireAnalyseController::class, 'list'])->name('listformulaireanalyse.index');
        Route::get('/formulaireanalyse/listanalyesesbylabo', [FormulaireAnalyseController::class, 'listByLaboratory'])->name('listformulaireanalysebylabo.index');
        Route::get('/formulaireanalyse/create', [FormulaireAnalyseController::class, 'create'])->name('formulaireanalyse.create');
        Route::put('/formulaireanalyse/validationcentreanalyse/{formulaireanalyse}', [FormulaireAnalyseController::class, 'validationcentreanalyse'])->name('formulaireanalysevalidationcentreanalyse.update');
        Route::put('/formulaireanalyse/novalidationcentreanalyse/{formulaireanalyse}', [FormulaireAnalyseController::class, 'novalidationcentreanalyse'])->name('formulaireanalysenovalidationcentreanalyse.update');
        Route::put('/formulaireanalyse/validationdirecteurlabo/{formulaireanalyse}', [FormulaireAnalyseController::class, 'validationdirecteurlabo'])->name('formulaireanalysevalidationdirecteurlabo.update');
        Route::put('/formulaireanalyse/novalidationdirecteurlabo/{formulaireanalyse}', [FormulaireAnalyseController::class, 'novalidationdirecteurlabo'])->name('formulaireanalysenovalidationdirecteurlabo.update');
        Route::put('/formulaireanalyse/validationenseignant/{formulaireanalyse}', [FormulaireAnalyseController::class, 'validationenseignant'])->name('formulaireanalysevalidationenseignant.update');
        Route::put('/formulaireanalyse/novalidationenseignant/{formulaireanalyse}', [FormulaireAnalyseController::class, 'novalidationenseignant'])->name('formulaireanalysenovalidationenseignant.update');
        Route::post('/formulaireanalyse', [FormulaireAnalyseController::class, 'store'])->name('formulaireanalyse.store');
        Route::get('/formulaireanalyse/{formulaireanalyse}', [FormulaireAnalyseController::class, 'show'])->name('formulaireanalyse.show');
        Route::get('/formulaireanalyse/{formulaireanalyse}/edit', [FormulaireAnalyseController::class, 'edit'])->name('formulaireanalyse.edit');
        Route::put('/formulaireanalyse/{formulaireanalyse}', [FormulaireAnalyseController::class, 'update'])->name('formulaireanalyse.update');
        Route::delete('/formulaireanalyse/{formulaireanalyse}', [FormulaireAnalyseController::class, 'destroy'])->name('formulaireanalyse.destroy');
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/formulairerevision', [FormulaireRevisionController::class, 'index'])->name('formulairerevision.index');
        Route::get('/formulairerevision/create', [FormulaireRevisionController::class, 'create'])->name('formulairerevision.create');
        Route::post('/formulairerevision', [FormulaireRevisionController::class, 'store'])->name('formulairerevision.store');
        Route::get('/formulairerevision/{formulairerevision}', [FormulaireRevisionController::class, 'show'])->name('formulairerevision.show');
        Route::get('/formulairerevision/{formulairerevision}/edit', [FormulaireRevisionController::class, 'edit'])->name('formulairerevision.edit');
        Route::put('/formulairerevision/{formulairerevision}', [FormulaireRevisionController::class, 'update'])->name('formulairerevision.update');
        Route::delete('/formulairerevision/{formulairerevision}', [FormulaireRevisionController::class, 'destroy'])->name('formulairerevision.destroy');
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/formulaireformation', [FormulaireFormationController::class, 'index'])->name('formulaireformation.index');
        Route::get('/formulaireformation/listformations', [FormulaireFormationController::class, 'list'])->name('listformulaireformation.index');
        Route::get('/formulaireformation/create', [FormulaireFormationController::class, 'create'])->name('formulaireformation.create');
        Route::put('/formulaireformation/validationcentreanalyse/{formulaireformation}', [FormulaireFormationController::class, 'validation'])->name('formulaireformationvalidationcentreanalyse.update');
        Route::put('/formulaireformation/novalidationcentreanalyse/{formulaireformation}', [FormulaireFormationController::class, 'novalidation'])->name('formulaireformationnovalidationcentreanalyse.update');
        Route::post('/formulaireformation', [FormulaireFormationController::class, 'store'])->name('formulaireformation.store');
        Route::get('/formulaireformation/{formulaireformation}', [FormulaireFormationController::class, 'show'])->name('formulaireformation.show');
        Route::get('/formulaireformation/{formulaireformation}/edit', [FormulaireFormationController::class, 'edit'])->name('formulaireformation.edit');
        Route::put('/formulaireformation/{formulaireformation}', [FormulaireFormationController::class, 'update'])->name('formulaireformation.update');
        Route::delete('/formulaireformation/{formulaireformation}', [FormulaireFormationController::class, 'destroy'])->name('formulaireformation.destroy');
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/formulairetraduction', [FormulaireTraductionController::class, 'index'])->name('formulairetraduction.index');
        Route::get('/formulairetraduction/create', [FormulaireTraductionController::class, 'create'])->name('formulairetraduction.create');
        Route::post('/formulairetraduction', [FormulaireTraductionController::class, 'store'])->name('formulairetraduction.store');
        Route::get('/formulairetraduction/{formulairetraduction}', [FormulaireTraductionController::class, 'show'])->name('formulairetraduction.show');
        Route::get('/formulairetraduction/{formulairetraduction}/edit', [FormulaireTraductionController::class, 'edit'])->name('formulairetraduction.edit');
        Route::put('/formulairetraduction/{formulairetraduction}', [FormulaireTraductionController::class, 'update'])->name('formulairetraduction.update');
        Route::delete('/formulairetraduction/{formulairetraduction}', [FormulaireTraductionController::class, 'destroy'])->name('formulairetraduction.destroy');
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/formulairepublication', [FormulairePublicationController::class, 'index'])->name('formulairepublication.index');
        Route::get('/formulairepublication/create', [FormulairePublicationController::class, 'create'])->name('formulairepublication.create');
        Route::post('/formulairepublication', [FormulairePublicationController::class, 'store'])->name('formulairepublication.store');
        Route::get('/formulairepublication/{formulairepublication}', [FormulairePublicationController::class, 'show'])->name('formulairepublication.show');
        Route::get('/formulairepublication/{formulairepublication}/edit', [FormulairePublicationController::class, 'edit'])->name('formulairepublication.edit');
        Route::put('/formulairepublication/{formulairepublication}', [FormulairePublicationController::class, 'update'])->name('formulairepublication.update');
        Route::delete('/formulairepublication/{formulairepublication}', [FormulairePublicationController::class, 'destroy'])->name('formulairepublication.destroy');
    });
});


Route::get('/entreprise/create', [EntrepriseController::class, 'create'])->name('entreprise.create');
Route::post('/entreprise', [EntrepriseController::class, 'store'])->name('entreprise.store');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/entreprise', [EntrepriseController::class, 'index'])->name('entreprise.index');
    Route::get('/entreprise/{entreprise}', [EntrepriseController::class, 'show'])->name('entreprise.show');
    Route::get('/entreprise/{entreprise}/edit', [EntrepriseController::class, 'edit'])->name('entreprise.edit');
    Route::put('/entreprise/{entreprise}', [EntrepriseController::class, 'update'])->name('entreprise.update');
    Route::delete('/entreprise/{entreprise}', [EntrepriseController::class, 'destroy'])->name('entreprise.destroy');
});
require __DIR__ . '/auth.php';
