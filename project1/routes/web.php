<?php

use App\Http\Controllers\LaboratoryController;
use App\Http\Controllers\ProfileController;
use App\Models\Laboratory;
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

Route::get('/listlabo', [LaboratoryController::class, 'index'])->middleware(['auth', 'verified'])->name('listlabo');
Route::get('/addlabo', [LaboratoryController::class, 'create'])->middleware(['auth', 'verified'])->name('addlabo');
Route::post('/addlabo', [LaboratoryController::class,'store'])->middleware(['auth', 'verified'])->name('addlabo');
Route::get('/editlabo/{id}', [LaboratoryController::class, 'edit'])->middleware(['auth', 'verified'])->name('editlabo');
Route::patch('/editlabo/{id}', [LaboratoryController::class, 'update'])->middleware(['auth', 'verified'])->name('editlabo');
Route::delete('/deletelabo/{id}', [LaboratoryController::class, 'destroy'])->middleware(['auth', 'verified'])->name('deletelabo');



Route::get('/listusers', function () {
    $users = User::paginate(10);
    return view('users.index',compact('users'));
})->middleware(['auth', 'verified'])->name('listusers');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::delete('/profile/{id}', [ProfileController::class, 'destroyid'])->name('profile.destroyid');

});

require __DIR__.'/auth.php';
