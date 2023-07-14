<?php

namespace App\Repository;

use App\Models\Niveau;
use App\Models\Promotion;
use App\Models\Etudiant;
use App\Models\Classe;
use App\Models\Section;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Repository\EtudiantPromotionRepositoryInterface;

use Toastr;

class EtudiantPromotionRepository implements EtudiantPromotionRepositoryInterface
{
    public function index()
    {
        $niveaux = Niveau::all();
        $etudiants = Etudiant::all();
        $classes = Classe::all();
        $sections = Section::all();
        return view('pages.promotions', compact('niveaux','etudiants','classes', 'sections'));
    }

    public function create()
    {
        $promotions = Promotion::all();
        return view('pages.promotions', compact('niveaux','etudiants','classes', 'sections'));
    }

    public function store($request)
    {
        DB::beginTransaction();

        try {
            // ... Your existing code ...

            DB::commit();
          //  Toastr::success('Ajoutée avec succès'); // Updated toastr usage
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        DB::beginTransaction();

        try {
            // ... Your existing code ...

            DB::commit();
          //  Toastr::error('Supprimé avec succès'); // Updated toastr usage
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
