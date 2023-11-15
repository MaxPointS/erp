<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class VechleInsurance extends Controller
{
    //

    public function Index():View{
        $pageName= trans('viechle.pageName');
        return view("cpanel.pages.ViechleView",compact("pageName"));
    }
}
