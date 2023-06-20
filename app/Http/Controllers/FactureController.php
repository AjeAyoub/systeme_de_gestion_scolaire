<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use App\Models\Etudiant;
use App\Models\Cout;
use Illuminate\Http\Request;

class FactureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $factures = Facture::all();
        $etudiants = Etudiant::all();
        $couts = cout::all();

        //------------searsh code--------------
        $search = $request->query('search');
        $factures = Facture::when($search, function ($query) use ($search) {
            $query->where('etudiant_id', 'like', "%$search%")
                ->orWhere('date', 'like', "%$search%")
                ->orWhere('cout_id', 'like', "%$search%")
                ->orWhere('statut', 'like', "%$search%")
                ->orWhere('description', 'like', "%$search%");
        })->paginate(6);
        //-----------end searsh code------------

        return view('pages.factures', compact('factures', 'etudiants', 'couts'));


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
        Facture::create($request->all());
        return to_route('facture.index')->with('success', 'Facture ajoutée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Facture $facture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Facture $facture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Facture $facture)
    {
        $facture->update($request->all());
        return to_route('facture.index')->with('update', 'Facture mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Facture $facture)
    {
        $facture->delete();
        return to_route('facture.index')->with('delete', 'Facture supprimée avec succès');
    }
}
