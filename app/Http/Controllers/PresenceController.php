<?php

namespace App\Http\Controllers;

use App\Models\Presence;
use App\Models\Etudiant;
use Illuminate\Http\Request;

class PresenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $presences = Presence::all();
        $etudiants = Etudiant::all();

        //------------searsh code--------------
        $search = $request->query('search');
        $presences = Presence::when($search, function ($query) use ($search) {
            $query->where('raison_absence', 'like', "%$search%")
                ->orWhere('etudiant_id', 'like', "%$search%");
        })->paginate(6);
        //-----------end searsh code------------

        return view('pages.presences', compact('presences', 'etudiants'));


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
        Presence::create($request->all());
        return to_route('presence.index')->with('success', 'Présence ajoutée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Presence $presence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Presence $presence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Presence $presence)
    {
        $presence->update($request->all());
        return to_route('presence.index')->with('update', 'Présence mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Presence $presence)
    {
        $presence->delete();
        return to_route('presence.index')->with('delete', 'Présence supprimée avec succès');
    }
}
