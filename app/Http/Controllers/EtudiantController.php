<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Parentt;
use App\Models\Niveau;
use App\Models\Classe;
use App\Models\Section;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {

        $etudiants = Etudiant::all();
        $parentts = Parentt::all();
        $sections = Section::all();
        $classes = Classe::all();
        $niveaux = Niveau::all();
        

        //------------searsh code--------------
        $search = $request->query('search');
        $etudiants = Etudiant::when($search, function ($query) use ($search) {
            $query->where('nom', 'like', "%$search%")
                ->orWhere('prenom', 'like', "%$search%")
                ->orWhere('datenaissance', 'like', "%$search%")
                ->orWhere('adresse', 'like', "%$search%")
                ->orWhere('genre', 'like', "%$search%")
                ->orWhere('nationalite', 'like', "%$search%")
                ->orWhere('parentt_id', 'like', "%$search%")
                ->orWhere('niveau_id', 'like', "%$search%")
                ->orWhere('classe_id', 'like', "%$search%")
                ->orWhere('section_id', 'like', "%$search%");
        })->paginate(6);
        //-----------end searsh code------------

        return view('pages.etudiants', compact('etudiants', 'parentts', 'niveaux', 'classes', 'sections'));
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

        Etudiant::create($request->all());
        return to_route('etudiant.index')->with('succss', 'Etudiant ajoutée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Etudiant $etudiant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Etudiant $etudiant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Etudiant $etudiant)
    {
        $etudiant->update($request->all());
        return to_route('etudiant.index')->with('update', 'Etudiant mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(etudiant $etudiant)
    {
        $etudiant->delete();
        return to_route('etudiant.index')->with('delete', 'Etudiant supprimée avec succès');
    }
}
