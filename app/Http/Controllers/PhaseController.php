<?php

namespace App\Http\Controllers;

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

    public function store(Request $request)
    {
        Phase::create($request->all());
        return to_route('phase.index')->with('success', 'Phase added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Phase $phase)
    {
        //
    }

    public function edit(Phase $phase)
    {
    
    }

    public function update(Request $request, Phase $phase)
    {
        $phase->update($request->all());
        return to_route('phase.index')->with('success', 'Phase updated successfully');

    }

    public function destroy(Phase $phase)
    {
        $phase->delete();
        return to_route('phase.index')->with('success', 'Phase deleted successfully');

    }
}
