<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use Illuminate\Http\Request;

class CalendarController extends Controller
{

    public function getEvent(){
        if(request()->ajax()){
            $start = (!empty($_GET["start"])) ? ($_GET["start"]) : ('');
            $end = (!empty($_GET["end"])) ? ($_GET["end"]) : ('');
            $events = Evenement::whereDate('start', '>=', $start)->whereDate('end',   '<=', $end)
                    ->get(['id','title','start', 'end']);
            return response()->json($events);
        }
        return view('fullcalendar');
         

}
}
