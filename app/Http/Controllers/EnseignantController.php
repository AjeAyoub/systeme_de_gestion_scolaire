<?php

namespace App\Http\Controllers;

use App\Models\Enseignant;
use App\Models\Matiere;
use App\Models\Niveau;
use App\Models\Classe;
use App\Models\Section;
use Illuminate\Http\Request;

class EnseignantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $enseignants = Enseignant::all();
        $matieres = Matiere::all();
        $sections = Section::all();
        $classes = Classe::all();
        $niveaux = Niveau::all();
        

        //------------searsh code--------------
        $search = $request->query('search');
        $enseignants = Enseignant::when($search, function ($query) use ($search) {
            $query->where('nom', 'like', "%$search%")
                ->orWhere('prenom', 'like', "%$search%")
                ->orWhere('telephone', 'like', "%$search%")
                ->orWhere('matiere_id', 'like', "%$search%")
                ->orWhere('niveau_id', 'like', "%$search%")
                ->orWhere('classe_id', 'like', "%$search%")
                ->orWhere('section_id', 'like', "%$search%");
        })->paginate(6);
        //-----------end searsh code------------

        return view('pages.enseignants', compact('enseignants', 'matieres', 'niveaux', 'classes', 'sections'));
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

        Enseignant::create($request->all());
        return to_route('enseignant.index')->with('succss', 'Enseignant ajoutée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Enseignant $enseignant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enseignant $enseignant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Enseignant $enseignant)
    {
        $enseignant->update($request->all());
        return to_route('enseignant.index')->with('update', 'Enseignant mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enseignant $enseignant)
    {
        $enseignant->delete();
        return to_route('enseignant.index')->with('delete', 'Enseignant supprimée avec succès');
    }
}
