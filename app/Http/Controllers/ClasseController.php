<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Phase;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $classes = Classe::all();
        //------------searsh code--------------
        $search = $request->query('search');
        $classes = Classe::when($search, function ($query) use ($search) {
            $query->where('nom', 'like', "%$search%")
                ->orWhere('phase_id', 'like', "%$search%");
        })->paginate(6);
        //-----------end searsh code------------
        $phases = Phase::all();

        return view('pages.classes', compact('classes', 'phases'));


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
        Classe::create($request->all());
        return to_route('classe.index')->with('succss', 'Classe ajoutée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Classe $classe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classe $classe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classe $classe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classe $classe)
    {
        //
    }
}
