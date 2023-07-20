<?php

namespace App\Http\Controllers;

use App\Models\Emploi;
use App\Models\Niveau;
use App\Models\Classe;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class EmploiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $emplois = Emploi::all();
        $niveaux = Niveau::all();
        $classes = Classe::all();
        $sections = Section::all();

       

        //------------searsh code--------------
        $search = $request->query('search');
        $emplois = Emploi::when($search, function ($query) use ($search) {
            $query->where('niveau_id', 'like', "%$search%")
            ->orWhere('classe_id', 'like', "%$search%")
            ->orWhere('section_id', 'like', "%$search%")
            ->orWhere('file', 'like', "%$search%");

        })->paginate(6);
        //-----------end searsh code------------

        return view('pages.emplois', compact('emplois', 'sections', 'niveaux', 'classes'));
    }

    public function emploisEtPr()
    {
        $emplois = Emploi::all();
        $niveaux = Niveau::all();
        $classes = Classe::all();
        $sections = Section::all();
    
        return view('pages.emplois_et_pr', compact('emplois', 'niveaux', 'classes', 'sections'));
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
                'niveau_id' => 'required|exists:niveaux,id',
                'classe_id' => 'required|exists:classes,id',
                'section_id' => 'required|exists:sections,id',
                'file' => 'required|mimes:pdf|max:2048',
            ]);
        
            if ($request->hasFile('file')) {
                $pdfFile = $request->file('file');
        
                // Store the PDF file in the storage directory
                $pdfPath = $pdfFile->store('pdf', 'public');
        
                // Create a new Emploi instance and set the attributes
                $emploi = new Emploi;
                $emploi->niveau_id = $request->niveau_id;
                $emploi->classe_id = $request->classe_id;
                $emploi->section_id = $request->section_id;
                $emploi->file = $pdfPath;
        
                // Save the Emploi instance to the database
                $emploi->save();
        
                return redirect()->back()->with('success', 'Emploi ajoutée avec succès.');
            }
        
            return redirect()->back()->with('error', 'Failed to Échec du téléchargement Emploi');
        
    }        

    /**
     * Display the specified resource.
     */
    public function show(Emploi $emploi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Emploi $emploi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Emploi $emploi)
    {
        $emploi->update($request->all());
        return to_route('emploi.index')->with('update', 'Emploi mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Emploi $emploi)
    {
        $emploi->delete();
        return to_route('emploi.index')->with('delete', 'Emploi supprimée avec succès');
    }
}
