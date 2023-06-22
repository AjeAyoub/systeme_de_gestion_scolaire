<?php

namespace App\Http\Controllers;

use App\Models\Cantine;
use App\Models\Etudiant;
use App\Models\Cout;
use App\Models\Repa;
use Illuminate\Http\Request;

class CantineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cantines = Cantine::all();
        $etudiants = Etudiant::all();
        $couts = cout::all();
        $repas = Repa::all();

        //------------searsh code--------------
        $search = $request->query('search');
        $cantines = Cantine::when($search, function ($query) use ($search) {
            $query->where('etudiant_id', 'like', "%$search%")
                ->orWhere('date', 'like', "%$search%")
                ->orWhere('heure', 'like', "%$search%")
                ->orWhere('repa_id', 'like', "%$search%")
                ->orWhere('cout_id', 'like', "%$search%")
                ->orWhere('statut', 'like', "%$search%");
        })->paginate(6);
        //-----------end searsh code------------

        return view('pages.cantines', compact('cantines', 'etudiants', 'repas', 'couts'));


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
        Cantine::create($request->all());
        return to_route('cantine.index')->with('success', 'Cantine ajoutée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cantine $cantine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cantine $cantine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cantine $cantine)
    {
        $cantine->update($request->all());
        return to_route('cantine.index')->with('update', 'Cantine mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cantine $cantine)
    {
        $cantine->delete();
        return to_route('cantine.index')->with('delete', 'Cantine supprimée avec succès');
    }
}
