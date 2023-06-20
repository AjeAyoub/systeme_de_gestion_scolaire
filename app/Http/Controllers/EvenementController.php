<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Niveau;
use App\Models\Classe;
use App\Models\Section;
use App\Models\Cout;
use Illuminate\Http\Request;

class EvenementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $evenements = Evenement::all();
        $niveaux = Niveau::all();
        $classes = Classe::all();
        $sections = Section::all();
        $couts = Cout::all();
        

        //------------searsh code--------------
        $search = $request->query('search');
        $evenements = Evenement::when($search, function ($query) use ($search) {
            $query->where('nom', 'like', "%$search%")
                ->orWhere('date', 'like', "%$search%")
                ->orWhere('description', 'like', "%$search%")
                ->orWhere('niveau_id', 'like', "%$search%")
                ->orWhere('classe_id', 'like', "%$search%")
                ->orWhere('section_id', 'like', "%$search%")
                ->orWhere('cout_id', 'like', "%$search%");
        })->paginate(6);
        //-----------end searsh code------------

        return view('pages.evenements', compact('evenements', 'couts', 'niveaux', 'classes', 'sections'));
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

        Evenement::create($request->all());
        return to_route('evenement.index')->with('succss', 'Evénement ajoutée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Evenement $evenement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evenement $evenement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Evenement $evenement)
    {
        $evenement->update($request->all());
        return to_route('evenement.index')->with('update', 'Evenement mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evenement $evenement)
    {
        $evenement->delete();
        return to_route('evenement.index')->with('delete', 'Evenement supprimée avec succès');
    }
}
