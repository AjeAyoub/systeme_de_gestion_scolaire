<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NiveauController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\DepartementController;

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

// Niveaux
Route::resource('niveau', NiveauController::class);
// Classes
Route::resource('classe', ClasseController::class);
// Sections
Route::resource('section', SectionController::class);
// Département
Route::resource('departement', DepartementController::class);



Route::get('/', function (){
    return view('welcome');
});


Route::get('/dashboard', function (){
    return view('dashboard');
})->name('dashboard');
