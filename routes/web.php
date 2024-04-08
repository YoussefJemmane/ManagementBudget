<?php

use App\Http\Controllers\AdministrateurController;
use App\Http\Controllers\CentreAnalyseController;
use App\Http\Controllers\CentreAppuiController;
use App\Http\Controllers\ChartController;
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
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceController;

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

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::post('/users/import', [UserController::class, 'import'])->name('users.import');
    Route::post('/users/export', [UserController::class, 'export'])->name('users.export');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/laboratory', [LaboratoryController::class, 'index'])->name('laboratory.index');
        Route::get('/laboratory/create', [LaboratoryController::class, 'create'])->name('laboratory.create');
        Route::post('/laboratory', [LaboratoryController::class, 'store'])->name('laboratory.store');
        Route::get('/laboratory/{laboratory}', [LaboratoryController::class, 'show'])->name('laboratory.show');
        Route::get('/laboratory/{laboratory}/edit', [LaboratoryController::class, 'edit'])->name('laboratory.edit');
        Route::put('/laboratory/{laboratory}', [LaboratoryController::class, 'update'])->name('laboratory.update');
        Route::delete('/laboratory/{laboratory}', [LaboratoryController::class, 'destroy'])->name('laboratory.destroy');
        Route::post('/laboratory/import', [LaboratoryController::class, 'import'])->name('labos.import');
        Route::post('/laboratory/export', [LaboratoryController::class, 'export'])->name('labos.export');
    
    });

    


    Route::group(['middleware' => 'auth'], function () {
        Route::get('/formulaireanalyse', [FormulaireAnalyseController::class, 'index'])->name('formulaireanalyse.index');
        Route::get('/formulaireanalyse/create', [FormulaireAnalyseController::class, 'create'])->name('formulaireanalyse.create');
        Route::put('/formulaireanalyse/validationcentreanalyse/{formulaireanalyse}', [FormulaireAnalyseController::class, 'validationcentreanalyse'])->name('formulaireanalysevalidationcentreanalyse.update');
        Route::put('/formulaireanalyse/novalidationcentreanalyse/{formulaireanalyse}', [FormulaireAnalyseController::class, 'novalidationcentreanalyse'])->name('formulaireanalysenovalidationcentreanalyse.update');
        Route::put('/formulaireanalyse/validationdirecteurlabo/{formulaireanalyse}', [FormulaireAnalyseController::class, 'validationdirecteurlabo'])->name('formulaireanalysevalidationdirecteurlabo.update');
        Route::put('/formulaireanalyse/novalidationdirecteurlabo/{formulaireanalyse}', [FormulaireAnalyseController::class, 'novalidationdirecteurlabo'])->name('formulaireanalysenovalidationdirecteurlabo.update');
        Route::put('/formulaireanalyse/validationenseignant/{formulaireanalyse}', [FormulaireAnalyseController::class, 'validationenseignant'])->name('formulaireanalysevalidationenseignant.update');
        Route::put('/formulaireanalyse/novalidationenseignant/{formulaireanalyse}', [FormulaireAnalyseController::class, 'novalidationenseignant'])->name('formulaireanalysenovalidationenseignant.update');
        Route::put('/formulaireanalyse/pendinganalyse/{formulaireanalyse}', [FormulaireAnalyseController::class, 'pendinganalyse'])->name('formulaireanalysependingexecutionanalyse.update');
        Route::put('/formulaireanalyse/executeanalyse/{formulaireanalyse}', [FormulaireAnalyseController::class, 'executeanalyse'])->name('formulaireanalyseexecutioncentreanalyse.update');
        Route::post('/formulaireanalyse', [FormulaireAnalyseController::class, 'store'])->name('formulaireanalyse.store');
        Route::get('/formulaireanalyse/{formulaireanalyse}', [FormulaireAnalyseController::class, 'show'])->name('formulaireanalyse.show');
        Route::get('/formulaireanalyse/{formulaireanalyse}/edit', [FormulaireAnalyseController::class, 'edit'])->name('formulaireanalyse.edit');
        Route::put('/formulaireanalyse/{formulaireanalyse}', [FormulaireAnalyseController::class, 'update'])->name('formulaireanalyse.update');
        Route::delete('/formulaireanalyse/{formulaireanalyse}', [FormulaireAnalyseController::class, 'destroy'])->name('formulaireanalyse.destroy');
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

  

    Route::group(['prefix' => 'import', 'middleware' => 'auth'], function () {
        Route::post('/users', [UserController::class, 'import'])->name('importusers');
        Route::post('/labos', [LaboratoryController::class, 'import'])->name('importlabos');
    });
    Route::group(['prefix' => 'export', 'middleware' => 'auth'], function () {
        Route::post('/users', [UserController::class, 'export'])->name('exportusers');
        Route::post('/labos', [LaboratoryController::class, 'export'])->name('exportlabos');
    });




    
    Route::get('services', [ServiceController::class, 'index'])->name('services.index');
    Route::get('services/create', [ServiceController::class, 'create'])->name('services.create');
    Route::put('services/addFraisService/{service}', [ServiceController::class, 'addFraisService'])->name('services.addFraisService');
    Route::post('services', [ServiceController::class, 'store'])->name('services.store');
    Route::get('services/{service}', [ServiceController::class, 'show'])->name('services.show');
    Route::get('services/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit');
    Route::put('services/{service}', [ServiceController::class, 'update'])->name('services.update');
    Route::delete('services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');
    Route::put('services/validationcentreappui/{service}', [ServiceController::class, 'validationcentreappui'])->name('services.validationcentreappui');
    Route::put('services/validationdirecteurlabo/{service}', [ServiceController::class, 'validationdirecteurlabo'])->name('services.validationdirecteurlabo');
    Route::put('services/validationenseignant/{service}', [ServiceController::class, 'validationenseignant'])->name('services.validationenseignant');
    Route::put('services/executionservice/{service}', [ServiceController::class, 'executiondeservice'])->name('services.executionservice');
    Route::put('services/novalidationcentreappui/{service}', [ServiceController::class, 'novalidationcentreappui'])->name('services.novalidationcentreappui');
    Route::put('services/novalidationdirecteurlabo/{service}', [ServiceController::class, 'novalidationdirecteurlabo'])->name('services.novalidationdirecteurlabo');
    Route::put('services/novalidationenseignant/{service}', [ServiceController::class, 'novalidationenseignant'])->name('services.novalidationenseignant');
    Route::put('services/pendingservice/{service}', [ServiceController::class, 'pendingservice'])->name('services.pendingservice');
    
});


Route::get('/entreprise/create', [UserController::class, 'createEntreprise'])->name('entreprise.create');
Route::post('/entreprise', [UserController::class, 'storeEntreprise'])->name('entreprise.store');


require __DIR__ . '/auth.php';
