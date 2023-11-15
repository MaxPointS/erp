<?php

namespace App\Http\Controllers\cpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class com_serviceController extends Controller
{
    //

    public function view():View{
        return view("cpanel.pages.companiesservice");
    }
}
