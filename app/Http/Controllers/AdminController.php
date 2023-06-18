<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $admins = Admin::all();

         //------------searsh code--------------
         $search = $request->query('search');
         $admins = Admin::when($search, function ($query) use ($search) {
             $query->where('nom', 'like', "%$search%")
                 ->orWhere('prenom', 'like', "%$search%")
                 ->orWhere('telephone', 'like', "%$search%");
         })->paginate(6);
         //-----------end searsh code------------

        return view('pages.admins', compact('admins'));
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
        Admin::create($request->all());
        return to_route('admin.index')->with('succes', 'Admin ajoutée avec succes');
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        $admin->update($request->all());
        return to_route('admin.index')->with('update', 'Admin mise à jour avec succès');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();
        return to_route('admin.index')->with('delete', 'Admin supprimée avec succès');
    }
}
