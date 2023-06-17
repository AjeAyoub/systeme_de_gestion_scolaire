<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Niveau;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $classes = Classe::all();
        //------------searsh code--------------
        $search = $request->query('search');
        $classes = Classe::when($search, function ($query) use ($search) {
            $query->where('nom', 'like', "%$search%")
                ->orWhere('niveau_id', 'like', "%$search%");
        })->paginate(6);
        //-----------end searsh code------------
        $niveaux = Niveau::all();

        return view('pages.classes', compact('classes', 'niveaux'));


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
        Classe::create($request->all());
        return to_route('classe.index')->with('success', 'Classe ajoutée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Classe $classe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classe $classe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classe $classe)
    {
        $classe->update($request->all());
        return to_route('classe.index')->with('update', 'Classe mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classe $classe)
    {
        $classe->delete();
        return to_route('classe.index')->with('delete', 'Classe supprimée avec succès');
    }
}
