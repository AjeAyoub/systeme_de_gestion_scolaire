<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePhaseRequest;
use App\Http\Requests\UpdatePhaseRequest;
use App\Models\Phase;
use Illuminate\Http\Request;

class PhaseController extends Controller
{
    public function index(Request $request)
    {
        $phases = Phase::paginate(6);

        $search = $request->query('search');
        
        $phases = Phase::when($search, function ($query) use ($search) {
            $query->where('nom', 'like', "%$search%")
                ->orWhere('remarque', 'like', "%$search%");
        })->paginate(6);

        return view('pages.phases', compact('phases'));

    }

    public function create()
    {
        //
    }

    public function store(StorePhaseRequest $request)
    {
        
        Phase::create($request->all());
        return to_route('phase.index')->with('success', 'Phase phase ajoutée avec succès');
    }


    public function show(Phase $phase)
    {
        //
    }

    public function edit(Phase $phase)
    {
    
    }

    public function update(UpdatePhaseRequest $request, Phase $phase)
    {
        $phase->update($request->all());
        return to_route('phase.index')->with('update', 'Phase mise à jour avec succès');

    }

    public function destroy(Phase $phase)
    {
        $phase->delete();
        return to_route('phase.index')->with('delete', 'Phase supprimée avec succès');

    }
}
