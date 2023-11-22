<?php

namespace App\Http\Controllers\cpanel;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class insurance extends Controller
{
    //

    public function Index():View{
        $pageName= trans('viechle.pageName');
        return view("cpanel.pages.insurancelist",compact("pageName"));
    }
}
