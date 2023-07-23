<?php

namespace App\Http\Controllers;

use App\Models\Compte;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class CompteController extends Controller
{
    public function index(Request $request)
    {
        $comptes = Compte::all();

        $search = $request->query('search');
        
        $comptes = Compte::when($search, function ($query) use ($search) {
            $query->where('name', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%")
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
        
        $roleMap = [
            'Admin' => 0,
            'Enseignant' => 1,
            'Comptable' => 2,
            'Etudiant' => 3,
            'Parent' => 4,
            'utilisateur' => 5, // Lowercase 'utilisateur' maps to 5
        ];

        // Hash the password using Hash::make() before creating the user
        $hashedPassword = Hash::make($request->input('password'));

        // Create a new compte
        $compte = Compte::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $hashedPassword,
            'role' => $request->input('role'),
        ]);

        // Create the corresponding user with the mapped role integer value
        $user = new User([
            'name' => $compte->name,
            'email' => $compte->email,
            'password' => $hashedPassword,
            'role' => $roleMap[$compte->role], // Map the string role to its corresponding integer value
        ]);

        // Save the user
        $user->save();

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
