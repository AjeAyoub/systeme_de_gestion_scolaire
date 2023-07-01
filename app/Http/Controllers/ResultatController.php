<?php

namespace App\Http\Controllers;

use App\Models\Resultat;
use App\Models\Etudiant;
use App\Models\Matiere;
use Illuminate\Http\Request;

class ResultatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $resultats = Resultat::all();
        $matieres = Matiere::all();
        $etudiants = Etudiant::all();


        //------------searsh code--------------
        $search = $request->query('search');
        $resultats = Resultat::when($search, function ($query) use ($search) {
            $query->where('matiere_id', 'like', "%$search%")
                ->orWhere('etudiant_id', 'like', "%$search%")
                ->orWhere('note_matiere', 'like', "%$search%")
                ->orWhere('note_examen', 'like', "%$search%")
                ->orWhere('note_finale', 'like', "%$search%")
                ->orWhere('statut', 'like', "%$search%")
                ->orWhere('option', 'like', "%$search%");
        })->paginate(6);
        //-----------end searsh code------------

        return view('pages.resultats', compact('resultats', 'matieres', 'etudiants'));
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

        Resultat::create($request->all());
        return to_route('resultat.index')->with('succss', 'Resultat ajoutée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Resultat $resultat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Resultat $resultat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Resultat $resultat)
    {
        $resultat->update($request->all());
        return to_route('resultat.index')->with('update', 'Resultat mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resultat $resultat)
    {
        $resultat->delete();
        return to_route('resultat.index')->with('delete', 'Resultat supprimée avec succès');
    }
}
