<?php

namespace App\Http\Controllers;

use App\Models\Cout;
use Illuminate\Http\Request;

class CoutController extends Controller
{
    public function index(Request $request)
    {
        $couts = Cout::all();

            //------------searsh code--------------
            $search = $request->query('search');
            $couts = Cout::when($search, function ($query) use ($search) {
                $query->where('nom', 'like', "%$search%")
                    ->orWhere('montant', 'like', "%$search%")
                    ->orWhere('date', 'like', "%$search%")
                    ->orWhere('description', 'like', "%$search%");
            })->paginate(6);
            //-----------end searsh code------------

            return view('pages.couts', compact('couts'));
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
        Cout::create($request->all());
        return to_route('cout.index')->with('succes', 'Cout ajoutée avec succes');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cout $cout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cout $cout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cout $cout)
    {
        $cout->update($request->all());
        return to_route('cout.index')->with('update', 'Cout mise à jour avec succès');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cout $cout)
    {
        $cout->delete();
        return to_route('cout.index')->with('delete', 'Cout supprimée avec succès');
    }
}
