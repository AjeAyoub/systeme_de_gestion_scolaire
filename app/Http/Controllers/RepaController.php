<?php

namespace App\Http\Controllers;

use App\Models\Repa;
use Illuminate\Http\Request;

class RepaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $repas = Repa::paginate(6);

        $search = $request->query('search');
        
        $repas = Repa::when($search, function ($query) use ($search) {
            $query->where('nom', 'like', "%$search%")
                ->orWhere('description', 'like', "%$search%");
        })->paginate(6);

        return view('pages.repas', compact('repas'));

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        
        Repa::create($request->all());
        return to_route('repa.index')->with('success', 'Repas ajoutée avec succès');
    }


    public function show(Repa $repa)
    {
        //
    }

    public function edit(Repa $repa)
    {
    
    }

    public function update(Request $request, Repa $repa)
    {
        $repa->update($request->all());
        return to_route('repa.index')->with('update', 'Repas mise à jour avec succès');

    }

    public function destroy(Repa $repa)
    {
        $repa->delete();
        return to_route('repa.index')->with('delete', 'Rapas supprimée avec succès');

    }
}
