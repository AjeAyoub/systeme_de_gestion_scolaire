<?php

namespace App\Http\Controllers;

use App\Models\Seance;
use App\Models\Enseignant;
use App\Models\Matiere;
use App\Models\Salle;
use Illuminate\Http\Request;

class SeanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $seances = Seance::all();
        $enseignants = Enseignant::all();
        $matieres = Matiere::all();
        $salles = Salle::all();

        //------------searsh code--------------
        $search = $request->query('search');
        $seances = Seance::when($search, function ($query) use ($search) {
            $query->where('nom', 'like', "%$search%")
                ->orWhere('description', 'like', "%$search%")
                ->orWhere('duree', 'like', "%$search%")
                ->orWhere('enseignant_id', 'like', "%$search%")
                ->orWhere('matiere_id', 'like', "%$search%")
                ->orWhere('salle_id', 'like', "%$search%");
        })->paginate(6);
        //-----------end searsh code------------

        return view('pages.seances', compact('seances', 'enseignants', 'matieres', 'salles'));
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

        Seance::create($request->all());
        return to_route('seance.index')->with('succss', 'Seance ajoutée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Seance $seance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Seance $seance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Seance $seance)
    {
        $seance->update($request->all());
        return to_route('seance.index')->with('update', 'Seance mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Seance $seance)
    {
        $seance->delete();
        return to_route('seance.index')->with('delete', 'Seance supprimée avec succès');
    }
}
