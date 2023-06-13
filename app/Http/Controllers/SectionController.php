<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Classe;
use App\Models\Niveau;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sections = Section::all();
        $classes = Classe::all();
        $niveaux = Niveau::all();

        //------------searsh code--------------
        $search = $request->query('search');
        $sections = Section::when($search, function ($query) use ($search) {
            $query->where('nom', 'like', "%$search%")
                ->orWhere('niveau_id', 'like', "%$search%")
                ->orWhere('classe_id', 'like', "%$search%");
        })->paginate(6);
        //-----------end searsh code------------

        return view('pages.sections', compact('sections', 'niveaux', 'classes'));
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

        Section::create($request->all());
        return to_route('section.index')->with('succss', 'Section ajoutée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Section $section)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Section $section)
    {
        //
    }
}
