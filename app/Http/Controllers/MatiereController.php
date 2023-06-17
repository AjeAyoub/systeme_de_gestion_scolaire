<?php

namespace App\Http\Controllers;

use App\Models\Matiere;
use Illuminate\Http\Request;

class MatiereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $matieres = Matiere::all();

         //------------searsh code--------------
        $search = $request->query('search');
        $matieres = Matiere::when($search, function ($query) use ($search) {
            $query->where('nom', 'like', "%$search%")
                ->orWhere('description', 'like', "%$search%");
        })->paginate(6);
         //-----------end searsh code------------

        return view('pages.matiere', compact('matieres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Matiere::create($request->all());
        return to_route('matiere.index')->with('succes', 'Matiere ajoutée avec succes');

    }

    /**
     * Display the specified resource.
     */
    public function show(Matiere $matiere)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Matiere $matiere)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Matiere $matiere)
    {
        $matiere->update($request->all());
        return to_route('matiere.index')->with('update', 'Matiere mise a jour avec succes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Matiere $matiere)
    {
        $matiere->delete();
        return to_route('matiere.index')->with('delete', 'Matiere supprimée avec succes');
    }
}
