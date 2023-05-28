<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhaseController;
use App\Http\Controllers\ClasseController;

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

// Phases
Route::resource('phase', PhaseController::class);
// Classes
Route::resource('classe', ClasseController::class);



Route::get('/', function (){
    return view('welcome');
});


Route::get('/dashboard', function (){
    return view('dashboard');
})->name('dashboard');
