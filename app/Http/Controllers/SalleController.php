<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Salle;
use Illuminate\Http\Request;

class SalleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $salles = Salle::all();
        $departements = Departement::all();

        //------------searsh code--------------
        $search = $request->query('search');
        $salles = Salle::when($search, function ($query) use ($search) {
            $query->where('numero', 'like', "%$search%")
                ->orWhere('departement_id', 'like', "%$search%");
        })->paginate(6);
        //-----------end searsh code------------

        return view('pages.salles', compact('salles', 'departements'));
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
        Salle::create($request->all());
        return to_route('salle.index')->with('succes', 'Salle Ajoutée avec succès');

    }

    /**
     * Display the specified resource.
     */
    public function show(Salle $salle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Salle $salle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Salle $salle)
    {
        $salle->update($request->all());
        return to_route('salle.index')->with('update', 'Salle mise a jour avec succes');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Salle $salle)
    {
        $salle->delete();
        return to_route('salle.index')->with('delete', 'Salle supprimée avec succes');
    }
}
