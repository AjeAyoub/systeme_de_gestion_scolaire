<?php

namespace App\Http\Controllers;

use App\Models\Controle;
use App\Models\Matiere;
use App\Models\Etudiant;

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
        $etudiants = Etudiant::all();

         //------------searsh code--------------
         $search = $request->query('search');
         $controles = Controle::when($search, function ($query) use ($search) {
             $query->join('etudiants', 'controles.etudiant_id', '=', 'etudiants.id')
                   ->join('matieres', 'controles.matiere_id', '=', 'matieres.id')
                   ->where('etudiants.nom', 'like', "%$search%")
                   ->orWhere('matieres.nom', 'like', "%$search%")
                   ->orWhere('note_controle', 'like', "%$search%")
                   ->orWhere('coefficient', 'like', "%$search%")
                   ->orWhere('remarque', 'like', "%$search%");
         })->paginate(6);
         //-----------end searsh code------------

         return view('pages.controles', compact('controles', 'matieres', 'etudiants'));
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

    public function controlesEtPr()
    {
        $controles = Controle::all();
        $matieres = Matiere::all();
        $etudiants = Etudiant::all();
    
        return view('pages.controles_et_pr', compact('controles', 'matieres', 'etudiants'));
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
