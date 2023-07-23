<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\NiveauController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\SalleController;
use App\Http\Controllers\MatiereController;                                                                                                                   
use App\Http\Controllers\ParenttController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ComptableController;
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
use App\Http\Controllers\ResultatController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\EmploiController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\CalendarController;

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


Route::get('/', function (){
    return view('welcome');
});

Route::get('/getevent', [CalendarController::class, 'getEvent'])->name('getevent');

Route::get('/emplois', [EmploiController::class, 'emploisEtPr'])->name('emplois');
Route::get('/exams', [ExamController::class, 'examsEtPr'])->name('exams');
Route::get('/controles', [ControleController::class, 'controlesEtPr'])->name('controles');
Route::get('/resultats', [ResultatController::class, 'resultatsEtPr'])->name('resultats');
Route::get('/presences', [PresenceController::class, 'presencesEtPr'])->name('presences');



Route::get('/evenements', function(){
    return view('pages.evenement_et_pr');

})->name('evenements');

// en & ad 
    // Presence
    Route::resource('presence', PresenceController::class);
    // Examen
    Route::resource('exam', ExamController::class);
    // Controle
    Route::resource('controle', ControleController::class);
    // Note
    Route::resource('note', NoteController::class);
    // Resultat
    Route::resource('resultat', ResultatController::class); 


Auth::routes();

// Route enseignant
Route::middleware(['auth','user-role:superadmin'])->group(function()
{
    
Route::get("/dashboard",function (){
    return view('dashboard');
})->name('dashboard');
});

Route::middleware(['auth','user-role:enseignant'])->group(function()
{
    Route::get("/enseignant.dashboard",function (){
        return view('enseignantdashboard');
    })->name('enseignant.dashboard');

});


// Route admin
Route::middleware(['auth','user-role:admin'])->group(function()
{


    Route::get("/admin.dashboard",function (){
        return view('admindashboard');
    })->name('admin.dashboard');

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
    // Comptable
    Route::resource('comptable', ComptableController::class);
    // Etudiant
    Route::resource('etudiant', EtudiantController::class);
    // Enseignant
    Route::resource('enseignant', EnseignantController::class);
    // Evenement
    Route::resource('evenement', EvenementController::class);
    // Seance
    Route::resource('seance', SeanceController::class);
    // Compte
    Route::resource('compte', CompteController::class);
    // Promotion
    Route::resource('promotion', PromotionController::class);
    // Emploi
    Route::resource('emploi', EmploiController::class);


    

});



// Route comptable
Route::middleware(['auth','user-role:comptable'])->group(function()
{
    Route::get("/comptable.dashboard",function (){
        return view('comptabledashboard');
    })->name('comptable.dashboard');
    // couts
   Route::resource('cout', CoutController::class);
    // Evenement
   // Route::resource('evenement', EvenementController::class);
    // Facture
    Route::resource('facture', FactureController::class);
    // Paiement_etudiant
    Route::resource('paiement_etudiant', PaiementetudiantController::class);
});

// Route etudiant
Route::middleware(['auth','user-role:etudiant'])->group(function()
{
    Route::get("/etudiant.dashboard",function (){
        return view('etudiantdashboard');
    })->name('etudiant.dashboard');


/*     // Evenement
    Route::resource('evenement', EvenementController::class);
    // Presence
    Route::resource('presence', PresenceController::class);
    // Examen
    Route::resource('exam', ExamController::class);
    // Controle
    Route::resource('controle', ControleController::class);
    // Note
    Route::resource('note', NoteController::class);
    // Resultat
    Route::resource('resultat', ResultatController::class);
    // Emploi
    Route::resource('emploi', EmploiController::class); */
   
});

// Route parent
Route::middleware(['auth','user-role:parent'])->group(function()
{
    Route::get("/parent.dashboard",function (){
        return view('parentdashboard');
    })->name('parent.dashboard');


    Route::get('/paiementetudiants', [PaiementetudiantController::class, 'paiementetudiantsCt'])->name('paiementetudiants');


/*     // couts
   Route::resource('cout', CoutController::class);
    // Evenement
    Route::resource('evenement', EvenementController::class);
    // Presence
    Route::resource('presence', PresenceController::class);
    // Facture
    Route::resource('facture', FactureController::class);
    // Paiement_etudiant
    Route::resource('paiement_etudiant', PaiementetudiantController::class);
    // Examen
    Route::resource('exam', ExamController::class);
    // Controle
    Route::resource('controle', ControleController::class);
    // Note
    Route::resource('note', NoteController::class);
    // Resultat
    Route::resource('resultat', ResultatController::class);
    // Emploi
    Route::resource('emploi', EmploiController::class); */

   
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

