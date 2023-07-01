<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NiveauController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\SalleController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\ParenttController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ComptableController;
use App\Http\Controllers\FraisController;
use App\Http\Controllers\CoutController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\EnseignantController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\PresenceController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\CantineController;
use App\Http\Controllers\RepaController;
use App\Http\Controllers\TransportController;
use App\Http\Controllers\PaiementetudiantController;
use App\Http\Controllers\SeanceController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ControleController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\CompteController;
use App\Http\Controllers\PromotionController;


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
// Salles
Route::resource('salle', SalleController::class);
// Matiere
Route::resource('matiere', MatiereController::class);
// Parent
Route::resource('parentt', ParenttController::class);
// Admin
Route::resource('admin', AdminController::class);
// Comptable
Route::resource('comptable', ComptableController::class);
// Frais
Route::resource('frais', FraisController::class);
// couts
Route::resource('cout', CoutController::class);
// Etudiant
Route::resource('etudiant', EtudiantController::class);
// Enseignant
Route::resource('enseignant', EnseignantController::class);
// Evenement
Route::resource('evenement', EvenementController::class);
// Presence
Route::resource('presence', PresenceController::class);
// Facture
Route::resource('facture', FactureController::class);
// Cantine
Route::resource('cantine', CantineController::class);
// Repas
Route::resource('repa', RepaController::class);
// Transport
Route::resource('transport', TransportController::class);
// Paiement_etudiant
Route::resource('paiement_etudiant', PaiementetudiantController::class);
// Seance
Route::resource('seance', SeanceController::class);
// Examen
Route::resource('exam', ExamController::class);
// Controle
Route::resource('controle', ControleController::class);
// Note
Route::resource('note', NoteController::class);
// Compte
Route::resource('compte', CompteController::class);
// Promotion
Route::resource('promotion', PromotionController::class);



Route::get('/', function (){
    return view('welcome');
});


Route::get('/dashboard', function (){
    return view('dashboard');
})->name('dashboard');
