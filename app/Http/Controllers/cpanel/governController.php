<?php

namespace App\Http\Controllers\cpanel;

use App\Http\Controllers\Controller;
use App\Models\govern;
use Illuminate\Http\Request;
use Illuminate\View\View;

class governController extends Controller
{
    //
    public function ViewList():View
    {
        $governs = govern::get();
           
        return view('cpanel.pages.govern',compact("governs"));
    }
}
