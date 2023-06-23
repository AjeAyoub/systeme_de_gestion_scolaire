<?php

namespace App\Http\Controllers;

use App\Models\Controle;
use App\Models\Matiere;
use App\Models\Enseignant;
use App\Models\Niveau;
use App\Models\Classe;
use App\Models\Section;
use Illuminate\Http\Request;

class ControleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $controles = Controle::all();
        $matieres = Matiere::all();
        $enseignants = Enseignant::all();
        $niveaux = Niveau::all();
        $classes = Classe::all();
        $sections = Section::all();

        //------------searsh code--------------
        $search = $request->query('search');
        $controles = Controle::when($search, function ($query) use ($search) {
            $query->where('matiere_id', 'like', "%$search%")
                ->orWhere('enseignant_id', 'like', "%$search%")
                ->orWhere('niveau_id', 'like', "%$search%")
                ->orWhere('classe_id', 'like', "%$search%")
                ->orWhere('section_id', 'like', "%$search%");
        })->paginate(6);
        //-----------end searsh code------------

        return view('pages.controles', compact('controles', 'matieres', 'enseignants', 'sections', 'niveaux', 'classes'));
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

        Controle::create($request->all());
        return to_route('controle.index')->with('succss', 'Controle ajoutée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Controle $controle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Controle $controle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Controle $controle)
    {
        $controle->update($request->all());
        return to_route('controle.index')->with('update', 'Controle mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Controle $controle)
    {
        $controle->delete();
        return to_route('controle.index')->with('delete', 'Controle supprimée avec succès');
    }
}
