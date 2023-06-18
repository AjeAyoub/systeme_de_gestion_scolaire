<?php

namespace App\Http\Controllers;

use App\Models\Frais;
use Illuminate\Http\Request;

class FraisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $fraiss = Frais::all();

         //------------searsh code--------------
         $search = $request->query('search');
         $fraiss = Frais::when($search, function ($query) use ($search) {
             $query->where('nom', 'like', "%$search%")
                 ->orWhere('montant', 'like', "%$search%")
                 ->orWhere('date', 'like', "%$search%")
                 ->orWhere('description', 'like', "%$search%");
         })->paginate(6);
         //-----------end searsh code------------

        return view('pages.frais', compact('fraiss'));
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
        Frais::create($request->all());
        return to_route('frais.index')->with('succes', 'Frais ajoutée avec succes');
    }

    /**
     * Display the specified resource.
     */
    public function show(Frais $frais)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Frais $frais)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Frais $frais)
    {
        $frais->update($request->all());
        return to_route('frais.index')->with('update', 'Frais mise à jour avec succès');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Frais $frais)
    {
        $frais->delete();
        return to_route('frais.index')->with('delete', 'Frais supprimée avec succès');
    }
}
