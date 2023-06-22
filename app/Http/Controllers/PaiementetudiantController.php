<?php

namespace App\Http\Controllers;

use App\Models\Paiementetudiant;
use App\Models\Etudiant;
use App\Models\Cout;
use Illuminate\Http\Request;

class PaiementetudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $paiement_etudiants = Paiementetudiant::all();
        $etudiants = Etudiant::all();
        $couts = cout::all();

        //------------searsh code--------------
        $search = $request->query('search');
        $paiement_etudiants = Paiementetudiant::when($search, function ($query) use ($search) {
            $query->where('etudiant_id', 'like', "%$search%")
            ->orWhere('cout_id', 'like', "%$search%")
                ->orWhere('date', 'like', "%$search%")
                ->orWhere('statut', 'like', "%$search%")
                ->orWhere('mode', 'like', "%$search%")
                ->orWhere('remarque', 'like', "%$search%");
        })->paginate(6);
        //-----------end searsh code------------

        return view('pages.paiement_etudiants', compact('paiement_etudiants', 'etudiants', 'couts'));


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
        Paiementetudiant::create($request->all());
        return to_route('paiement_etudiant.index')->with('success', 'Paiement_etudiant ajoutée avec succès');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Paiementetudiant $paiement_etudiant)
    {
        //paiement_etudiant
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paiementetudiant $paiement_etudiant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Paiementetudiant $paiement_etudiant)
    {
        $paiement_etudiant->update($request->all());
        return to_route('paiement_etudiant.index')->with('update', 'Paiement_etudiant mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paiementetudiant $paiement_etudiant)
    {
        $paiement_etudiant->delete();
        return to_route('paiement_etudiant.index')->with('delete', 'Paiement_etudiant supprimée avec succès');
    }
}
