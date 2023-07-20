<?php

namespace App\Http\Controllers;

use App\Models\Resultat;
use App\Models\Etudiant;
use Illuminate\Http\Request;

class ResultatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $resultats = Resultat::all();
        $etudiants = Etudiant::all();


       //------------searsh code--------------
       $search = $request->query('search');
       $resultats = Resultat::when($search, function ($query) use ($search) {
           $query->join('etudiants', 'resultats.etudiant_id', '=', 'etudiants.id')
                 ->where('etudiants.nom', 'like', "%$search%");
       })->paginate(6);
       //-----------end searsh code------------

        return view('pages.resultats', compact('resultats', 'etudiants'));
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
        
        $request->validate([
            'etudiant_id' => 'required|exists:etudiants,id',
            'file' => 'required|mimes:pdf|max:2048',
        ]);
    
        if ($request->hasFile('file')) {
            $pdfFile = $request->file('file');
    
            // Store the PDF file in the storage directory
            $pdfPath = $pdfFile->store('pdf', 'public');
    
            // Create a new Resultat instance and set the attributes
            $resultat = new Resultat;
            $resultat->etudiant_id = $request->etudiant_id;
            $resultat->file = $pdfPath;
    
            // Save the Resultat instance to the database
            $resultat->save();
    
            return redirect()->back()->with('success', 'Resultat ajoutée avec succès.');
        }
    
        return redirect()->back()->with('error', 'Failed to Échec du téléchargement Resultat');
        
    } 

    public function resultatsEtPr()
    {
        $resultats = Resultat::all();
        $etudiants = Etudiant::all();
    
        return view('pages.resultats_et_pr', compact('resultats', 'etudiants'));
    }


    /**
     * Display the specified resource.
     */
    public function show(Resultat $resultat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Resultat $resultat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Resultat $resultat)
    {
        $resultat->update($request->all());
        return to_route('resultat.index')->with('update', 'Resultat mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resultat $resultat)
    {
        $resultat->delete();
        return to_route('resultat.index')->with('delete', 'Resultat supprimée avec succès');
    }
}
