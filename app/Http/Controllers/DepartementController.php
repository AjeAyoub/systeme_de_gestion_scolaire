<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $departements = Departement::all();

        //------------searsh code--------------
        $search = $request->query('search');
        $departements = Departement::when($search, function ($query) use ($search) {
            $query->where('nom', 'like', "%$search%");
        })->paginate(6);
        //-----------end searsh code------------

        return view('pages.departements', compact('departements'));
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

        Departement::create($request->all());
        return to_route('departement.index')->with('success', 'Departement ajoutée avec succès');

    }

    /**
     * Display the specified resource.
     */
    public function show(Departement $departement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Departement $departement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Departement $departement)
    {
        $departement->update($request->all());
        return to_route('departement.index')->with('update', 'Département mise a jour avec Succes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Departement $departement)
    {
        $departement->delete();
        return to_route('departement.index')->with('delete', 'Départemet supprimée avec succes');
    }
}
