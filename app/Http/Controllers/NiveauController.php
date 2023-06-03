<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNiveauRequest;
use App\Http\Requests\UpdateNiveauRequest;
use App\Models\Niveau;
use Illuminate\Http\Request;

class NiveauController extends Controller
{
    public function index(Request $request)
    {
        $niveaux = Niveau::paginate(6);

        $search = $request->query('search');
        
        $niveaux = Niveau::when($search, function ($query) use ($search) {
            $query->where('nom', 'like', "%$search%")
                ->orWhere('remarque', 'like', "%$search%");
        })->paginate(6);

        return view('pages.niveaux', compact('niveaux'));

    }

    public function create()
    {
        //
    }

    public function store(StoreNiveauRequest $request)
    {
        
        Niveau::create($request->all());
        return to_route('niveau.index')->with('success', 'Niveau ajoutée avec succès');
    }


    public function show(Niveau $niveau)
    {
        //
    }

    public function edit(Niveau $niveau)
    {
    
    }

    public function update(UpdateNiveauRequest $request, Niveau $niveau)
    {
        $niveau->update($request->all());
        return to_route('niveau.index')->with('update', 'Niveau mise à jour avec succès');

    }

    public function destroy(Niveau $niveau)
    {
        $niveau->delete();
        return to_route('niveau.index')->with('delete', 'Niveau supprimée avec succès');

    }
}
