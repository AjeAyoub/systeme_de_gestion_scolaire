<?php

namespace App\Http\Controllers;

use App\Models\Transport;
use App\Models\Etudiant;
use App\Models\Cout;
use Illuminate\Http\Request;

class TransportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $transports = Transport::all();
        $etudiants = Etudiant::all();
        $couts = cout::all();

        //------------searsh code--------------
        $search = $request->query('search');
        $transports = Transport::when($search, function ($query) use ($search) {
            $query->where('etudiant_id', 'like', "%$search%")
                ->orWhere('numero', 'like', "%$search%")
                ->orWhere('cout_id', 'like', "%$search%")
                ->orWhere('statut', 'like', "%$search%");
        })->paginate(6);
        //-----------end searsh code------------

        return view('pages.transports', compact('transports', 'etudiants', 'couts'));


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
        Transport::create($request->all());
        return to_route('transport.index')->with('success', 'Transport ajoutée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transport $transport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transport $transport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transport $transport)
    {
        $transport->update($request->all());
        return to_route('transport.index')->with('update', 'Transport mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transport $transport)
    {
        $transport->delete();
        return to_route('transport.index')->with('delete', 'Transport supprimée avec succès');
    }
}
