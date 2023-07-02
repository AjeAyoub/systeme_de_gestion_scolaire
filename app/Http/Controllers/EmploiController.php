<?php

namespace App\Http\Controllers;

use App\Models\Emploi;
use App\Models\Niveau;
use App\Models\Classe;
use App\Models\Section;
use App\Models\Enseignant;
use App\Models\Departement;
use App\Models\Salle;
use Illuminate\Http\Request;

class EmploiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $emplois = Emploi::all();
        $niveaux = Niveau::all();
        $classes = Classe::all();
        $sections = Section::all();
        $enseignants = Enseignant::all();
        $departements = Departement::all();
        $salles = Salle::all();

        //------------searsh code--------------
        $search = $request->query('search');
        $emplois = Emploi::when($search, function ($query) use ($search) {
            $query->where('departement_id', 'like', "%$search%")
                ->orWhere('enseignant_id', 'like', "%$search%")
                ->orWhere('niveau_id', 'like', "%$search%")
                ->orWhere('classe_id', 'like', "%$search%")
                ->orWhere('section_id', 'like', "%$search%")
                ->orWhere('salle_id', 'like', "%$search%")
                ->orWhere('jour_semaine', 'like', "%$search%")
                ->orWhere('heure_debut', 'like', "%$search%")
                ->orWhere('heure_fin', 'like', "%$search%");
        })->paginate(6);
        //-----------end searsh code------------

        return view('pages.emplois', compact('emplois', 'departements', 'enseignants', 'sections', 'niveaux', 'classes', 'salles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Emploi::create($request->all());
        return to_route('emploi.index')->with('succss', 'Emploi ajoutée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Emploi $emploi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Emploi $emploi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Emploi $emploi)
    {
        $emploi->update($request->all());
        return to_route('emploi.index')->with('update', 'Emploi mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Emploi $emploi)
    {
        $emploi->delete();
        return to_route('emploi.index')->with('delete', 'Emploi supprimée avec succès');
    }
}
