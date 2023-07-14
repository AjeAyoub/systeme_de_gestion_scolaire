<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evenement;


class AdminDashboardController extends Controller
{
    public function index()
    {
        $evenements = Evenement::all();
        return view('admindashboard', compact('evenements')); 
    }

   
}
