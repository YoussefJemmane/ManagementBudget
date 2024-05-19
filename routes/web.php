<?php

use App\Http\Controllers\ChartController;
use App\Http\Controllers\FormulaireAnalyseController;
use App\Http\Controllers\FormulaireFormationController;
use App\Http\Controllers\LaboratoryController;
use App\Http\Controllers\ProfileController;
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

    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/', [UserController::class, 'store'])->name('users.store');
        Route::get('/{user}', [UserController::class, 'show'])->name('users.show');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('users.destroy');
        Route::post('/import', [UserController::class, 'import'])->name('users.import');
        Route::post('/export', [UserController::class, 'export'])->name('users.export');
    });


    Route::prefix('laboratory')->group(function () {
        Route::get('/', [LaboratoryController::class, 'index'])->name('laboratory.index');
        Route::get('/create', [LaboratoryController::class, 'create'])->name('laboratory.create');
        Route::post('/', [LaboratoryController::class, 'store'])->name('laboratory.store');
        Route::get('/{laboratory}', [LaboratoryController::class, 'show'])->name('laboratory.show');
        Route::get('/{laboratory}/edit', [LaboratoryController::class, 'edit'])->name('laboratory.edit');
        Route::put('/{laboratory}', [LaboratoryController::class, 'update'])->name('laboratory.update');
        Route::delete('/{laboratory}', [LaboratoryController::class, 'destroy'])->name('laboratory.destroy');
        Route::post('/import', [LaboratoryController::class, 'import'])->name('labos.import');
        Route::post('/export', [LaboratoryController::class, 'export'])->name('labos.export');
    });





    Route::prefix('formulaireanalyse')->group(function () {
        Route::get('/', [FormulaireAnalyseController::class, 'index'])->name('formulaireanalyse.index');
        Route::get('/create', [FormulaireAnalyseController::class, 'create'])->name('formulaireanalyse.create');
        Route::post('/', [FormulaireAnalyseController::class, 'store'])->name('formulaireanalyse.store');
        Route::get('/{formulaireanalyse}', [FormulaireAnalyseController::class, 'show'])->name('formulaireanalyse.show');
        Route::get('/{formulaireanalyse}/edit', [FormulaireAnalyseController::class, 'edit'])->name('formulaireanalyse.edit');
        Route::put('/{formulaireanalyse}', [FormulaireAnalyseController::class, 'update'])->name('formulaireanalyse.update');
        Route::delete('/{formulaireanalyse}', [FormulaireAnalyseController::class, 'destroy'])->name('formulaireanalyse.destroy');
        Route::get('/generatepdf/{formulaireanalyse}', [FormulaireAnalyseController::class, 'generatepdf'])->name('formulaireanalyse.generatepdf');

        Route::put('/validationcentreanalyse/{formulaireanalyse}', [FormulaireAnalyseController::class, 'validationcentreanalyse'])->name('formulaireanalysevalidationcentreanalyse.update');
        Route::put('/novalidationcentreanalyse/{formulaireanalyse}', [FormulaireAnalyseController::class, 'novalidationcentreanalyse'])->name('formulaireanalysenovalidationcentreanalyse.update');
        Route::put('/validationdirecteurlabo/{formulaireanalyse}', [FormulaireAnalyseController::class, 'validationdirecteurlabo'])->name('formulaireanalysevalidationdirecteurlabo.update');
        Route::put('/novalidationdirecteurlabo/{formulaireanalyse}', [FormulaireAnalyseController::class, 'novalidationdirecteurlabo'])->name('formulaireanalysenovalidationdirecteurlabo.update');
        Route::put('/validationenseignant/{formulaireanalyse}', [FormulaireAnalyseController::class, 'validationenseignant'])->name('formulaireanalysevalidationenseignant.update');
        Route::put('/novalidationenseignant/{formulaireanalyse}', [FormulaireAnalyseController::class, 'novalidationenseignant'])->name('formulaireanalysenovalidationenseignant.update');
        Route::put('/pendinganalyse/{formulaireanalyse}', [FormulaireAnalyseController::class, 'pendinganalyse'])->name('formulaireanalysependingexecutionanalyse.update');
        Route::put('/executeanalyse/{formulaireanalyse}', [FormulaireAnalyseController::class, 'executeanalyse'])->name('formulaireanalyseexecutioncentreanalyse.update');
    });


    Route::prefix('formulaireformation')->group(function () {
        Route::get('/', [FormulaireFormationController::class, 'index'])->name('formulaireformation.index');
        Route::get('/listformations', [FormulaireFormationController::class, 'list'])->name('listformulaireformation.index');
        Route::get('/create', [FormulaireFormationController::class, 'create'])->name('formulaireformation.create');
        Route::post('/', [FormulaireFormationController::class, 'store'])->name('formulaireformation.store');
        Route::get('/{formulaireformation}', [FormulaireFormationController::class, 'show'])->name('formulaireformation.show');
        Route::get('/{formulaireformation}/edit', [FormulaireFormationController::class, 'edit'])->name('formulaireformation.edit');
        Route::put('/{formulaireformation}', [FormulaireFormationController::class, 'update'])->name('formulaireformation.update');
        Route::delete('/{formulaireformation}', [FormulaireFormationController::class, 'destroy'])->name('formulaireformation.destroy');

        Route::put('/validationcentreanalyse/{formulaireformation}', [FormulaireFormationController::class, 'validation'])->name('formulaireformation.validationcentreanalyse');
        Route::put('/novalidationcentreanalyse/{formulaireformation}', [FormulaireFormationController::class, 'novalidation'])->name('formulaireformation.novalidationcentreanalyse');
    });






    Route::prefix('services')->group(function () {
        Route::get('/', [ServiceController::class, 'index'])->name('services.index');
        Route::get('/create', [ServiceController::class, 'create'])->name('services.create');
        Route::post('/', [ServiceController::class, 'store'])->name('services.store');
        Route::get('/{service}', [ServiceController::class, 'show'])->name('services.show');
        Route::get('/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit');
        Route::put('/{service}', [ServiceController::class, 'update'])->name('services.update');
        Route::delete('/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');
        Route::get('/generatepdf/{service}', [ServiceController::class, 'generatepdf'])->name('services.generatepdf');


        Route::put('/addFraisService/{service}', [ServiceController::class, 'addFraisService'])->name('services.addFraisService');
        Route::put('/validationcentreappui/{service}', [ServiceController::class, 'validationcentreappui'])->name('services.validationcentreappui');
        Route::put('/validationdirecteurlabo/{service}', [ServiceController::class, 'validationdirecteurlabo'])->name('services.validationdirecteurlabo');
        Route::put('/validationenseignant/{service}', [ServiceController::class, 'validationenseignant'])->name('services.validationenseignant');
        Route::put('/executiondeservice/{service}', [ServiceController::class, 'executiondeservice'])->name('services.executionservice');
        Route::put('/novalidationcentreappui/{service}', [ServiceController::class, 'novalidationcentreappui'])->name('services.novalidationcentreappui');
        Route::put('/novalidationdirecteurlabo/{service}', [ServiceController::class, 'novalidationdirecteurlabo'])->name('services.novalidationdirecteurlabo');
        Route::put('/novalidationenseignant/{service}', [ServiceController::class, 'novalidationenseignant'])->name('services.novalidationenseignant');
        Route::put('/pendingservice/{service}', [ServiceController::class, 'pendingservice'])->name('services.pendingservice');

        Route::get('/lettreacceptatiom/{service}', [ServiceController::class, 'downloadLettreAcceptation'])->name('services.lettreacceptationPDF');
        Route::get('/article/{service}', [ServiceController::class, 'downloadArticle'])->name('services.articlePDF');
    });

});


Route::prefix('entreprise')->group(function () {
    Route::get('/create', [UserController::class, 'createEntreprise'])->name('entreprise.create');
    Route::post('/', [UserController::class, 'storeEntreprise'])->name('entreprise.store');
});


require __DIR__ . '/auth.php';
