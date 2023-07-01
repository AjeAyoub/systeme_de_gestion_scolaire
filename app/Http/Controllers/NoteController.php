<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Etudiant;
use App\Models\Matiere;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $notes = Note::all();
        $matieres = Matiere::all();
        $etudiants = Etudiant::all();


        //------------searsh code--------------
        $search = $request->query('search');
        $notes = Note::when($search, function ($query) use ($search) {
            $query->where('matiere_id', 'like', "%$search%")
                ->orWhere('etudiant_id', 'like', "%$search%")
                ->orWhere('note', 'like', "%$search%");
        })->paginate(6);
        //-----------end searsh code------------

        return view('pages.notes', compact('notes', 'matieres', 'etudiants'));
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

        Note::create($request->all());
        return to_route('note.index')->with('succss', 'Note ajoutée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        $note->update($request->all());
        return to_route('note.index')->with('update', 'Note mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        $note->delete();
        return to_route('note.index')->with('delete', 'Note supprimée avec succès');
    }
}
