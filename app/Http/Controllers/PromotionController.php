<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use App\Models\Etudiant;
use App\Models\Niveau;
use App\Models\Classe;
use App\Models\Section;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $promotions = Promotion::all();
        $etudiants = Etudiant::all();
        $sections = Section::all();
        $classes = Classe::all();
        $niveaux = Niveau::all();

        //------------searsh code--------------
        $search = $request->query('search');
        $promotions = Promotion::when($search, function ($query) use ($search) {
            $query->where('etudiant_id', 'like', "%$search%")
                ->orWhere('niveau_id', 'like', "%$search%")
                ->orWhere('classe_id', 'like', "%$search%")
                ->orWhere('section_id', 'like', "%$search%")
                ->orWhere('annee_scolaire', 'like', "%$search%")
                ->orWhere('to_niveau_id', 'like', "%$search%")
                ->orWhere('to_classe_id', 'like', "%$search%")
                ->orWhere('to_section_id', 'like', "%$search%")
                ->orWhere('nouvel_an_scolaire', 'like', "%$search%");
        })->paginate(6);
        //-----------end searsh code------------

        return view('pages.promotions', compact('promotions', 'etudiants','sections', 'niveaux', 'classes'));
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

        Promotion::create($request->all());
        return to_route('promotion.index')->with('succss', 'Promotion ajoutée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Promotion $promotion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Promotion $promotion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Promotion $promotion)
    {
        $promotion->update($request->all());
        return to_route('promotion.index')->with('update', 'Promotion mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Promotion $promotion)
    {
        $promotion->delete();
        return to_route('promotion.index')->with('delete', 'Promotion supprimée avec succès');
    }
}
