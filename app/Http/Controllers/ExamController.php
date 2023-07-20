<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Matiere;
use App\Models\Etudiant;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $exams = Exam::all();
        $matieres = Matiere::all();
        $etudiants = Etudiant::all();


        //------------searsh code--------------
        $search = $request->query('search');
        $exams = Exam::when($search, function ($query) use ($search) {
            $query->join('etudiants', 'exams.etudiant_id', '=', 'etudiants.id')
                  ->join('matieres', 'exams.matiere_id', '=', 'matieres.id')
                  ->where('etudiants.nom', 'like', "%$search%")
                  ->orWhere('matieres.nom', 'like', "%$search%")
                  ->orWhere('note_exam', 'like', "%$search%")
                  ->orWhere('coefficient', 'like', "%$search%")
                  ->orWhere('remarque', 'like', "%$search%");
        })->paginate(6);
        //-----------end searsh code------------

        return view('pages.exams', compact('exams', 'matieres', 'etudiants'));
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

        Exam::create($request->all());
        return to_route('exam.index')->with('succss', 'Exam ajoutée avec succès');
    }


    public function examsEtPr()
    {
        $exams = Exam::all();
        $matieres = Matiere::all();
        $etudiants = Etudiant::all();
    
        return view('pages.exams_et_pr', compact('exams', 'matieres', 'etudiants'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Exam $exam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exam $exam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Exam $exam)
    {
        $exam->update($request->all());
        return to_route('exam.index')->with('update', 'Exam mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exam $exam)
    {
        $exam->delete();
        return to_route('exam.index')->with('delete', 'Exam supprimée avec succès');
    }
}
