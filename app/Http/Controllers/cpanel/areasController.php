<?php

namespace App\Http\Controllers\cpanel;

use App\Http\Controllers\Controller;
use App\Models\govern;
use App\Models\governArea;
use Illuminate\Http\Request;
use Illuminate\View\View;

class areasController extends Controller
{
    //
    public function showList(){
    
           $governs = govern::with("govern_areas")->get();
           $total=0;
           foreach($governs as $area){
            $total+=$area->govern_areas->count();
           }
        // return   $areas = govern:: with("govern_areas")->get();
        return View("cpanel.pages.areas",compact("governs","total"));
    }
}
