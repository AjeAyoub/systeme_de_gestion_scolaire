<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotion;
use App\Models\Etudiant;
use App\Models\Niveau;
use App\Models\Classe;
use App\Models\Section;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $etudiants = Etudiant::all();
        $niveaux = Niveau::all();
        $classes = Classe::all();
        $sections = Section::all();

        return view('pages.promotions', compact('etudiants', 'niveaux', 'classes', 'sections'));
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
// Validate the form data
$validatedData = $request->validate([
    'etudiant_ids' => 'required|array',
    'etudiant_ids.*' => 'exists:etudiants,id',
    'niveau_id' => 'required|exists:niveaux,id',
    'classe_id' => 'required|exists:classes,id',
    'section_id' => 'required|exists:sections,id',
    'vers_niveau_id' => 'required|exists:niveaux,id',
    'vers_classe_id' => 'required|exists:classes,id',
    'vers_section_id' => 'required|exists:sections,id',
]);

// Loop through each selected student and create a new Promotion record for each
foreach ($validatedData['etudiant_ids'] as $etudiantId) {
    $promotionData = [
        'etudiant_id' => $etudiantId,
        'niveau_id' => $validatedData['niveau_id'],
        'classe_id' => $validatedData['classe_id'],
        'section_id' => $validatedData['section_id'],
        'vers_niveau_id' => $validatedData['vers_niveau_id'],
        'vers_classe_id' => $validatedData['vers_classe_id'],
        'vers_section_id' => $validatedData['vers_section_id'],
    ];

    // Create a new Promotion record for the student
    Promotion::create($promotionData);

    // Update the corresponding student's record in the 'etudiants' table
    $etudiant = Etudiant::find($etudiantId);
    $etudiant->niveau_id = $validatedData['vers_niveau_id'];
    $etudiant->classe_id = $validatedData['vers_classe_id'];
    $etudiant->section_id = $validatedData['vers_section_id'];
    $etudiant->save();
}
        // Redirect back to the promotion view with a success message
        return redirect()->back()->with('success', 'Etudiant(s) promu avec succès!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
