<?php

namespace App\Http\Controllers;

use App\Models\Compte;
use Illuminate\Http\Request;

class CompteController extends Controller
{
    public function index(Request $request)
    {
        $comptes = Compte::paginate(6);

        $search = $request->query('search');
        
        $comptes = Compte::when($search, function ($query) use ($search) {
            $query->where('email', 'like', "%$search%")
                ->orWhere('password', 'like', "%$search%")
                ->orWhere('role', 'like', "%$search%");
        })->paginate(6);

        return view('pages.comptes', compact('comptes'));

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        
        Compte::create($request->all());
        return to_route('compte.index')->with('success', 'Compte ajoutée avec succès');
    }


    public function show(Compte $compte)
    {
        //
    }

    public function edit(Compte $compte)
    {
    
    }

    public function update(Request $request, Compte $compte)
    {
        $compte->update($request->all());
        return to_route('compte.index')->with('update', 'Compte mise à jour avec succès');

    }

    public function destroy(Compte $compte)
    {
        $compte->delete();
        return to_route('compte.index')->with('delete', 'Compte supprimée avec succès');

    }
}
