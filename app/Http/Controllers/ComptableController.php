<?php

namespace App\Http\Controllers;

use App\Models\Comptable;
use Illuminate\Http\Request;

class ComptableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $comptables = Comptable::all();

         //------------searsh code--------------
         $search = $request->query('search');
         $comptables = Comptable::when($search, function ($query) use ($search) {
             $query->where('nom', 'like', "%$search%")
                 ->orWhere('prenom', 'like', "%$search%")
                 ->orWhere('telephone', 'like', "%$search%");
         })->paginate(6);
         //-----------end searsh code------------

        return view('pages.comptables', compact('comptables'));
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
        Comptable::create($request->all());
        return to_route('comptable.index')->with('succes', 'Comptable ajoutée avec succes');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comptable $comptable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comptable $comptable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comptable $comptable)
    {
        $comptable->update($request->all());
        return to_route('comptable.index')->with('update', 'Comptable mise à jour avec succès');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comptable $comptable)
    {
        $comptable->delete();
        return to_route('comptable.index')->with('delete', 'Comptable supprimée avec succès');
    }
}
