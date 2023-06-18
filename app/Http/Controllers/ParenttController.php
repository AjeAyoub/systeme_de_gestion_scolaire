<?php

namespace App\Http\Controllers;

use App\Models\Parentt;
use Illuminate\Http\Request;

class ParenttController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $parentts = Parentt::all();

         //------------searsh code--------------
         $search = $request->query('search');
         $parentts = Parentt::when($search, function ($query) use ($search) {
             $query->where('nom', 'like', "%$search%")
                 ->orWhere('prenom', 'like', "%$search%")
                 ->orWhere('telephone', 'like', "%$search%");
         })->paginate(6);
         //-----------end searsh code------------

        return view('pages.parentts', compact('parentts'));
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
        Parentt::create($request->all());
        return to_route('parentt.index')->with('succes', 'Parent ajoutée avec succes');
    }

    /**
     * Display the specified resource.
     */
    public function show(Parentt $parentt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Parentt $parentt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Parentt $parentt)
    {
        $parentt->update($request->all());
        return to_route('parentt.index')->with('update', 'Parent mise à jour avec succès');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Parentt $parentt)
    {
        $parentt->delete();
        return to_route('parentt.index')->with('delete', 'Parent supprimée avec succès');
    }
}
