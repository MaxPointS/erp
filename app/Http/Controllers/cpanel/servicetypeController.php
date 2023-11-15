<?php

namespace App\Http\Controllers\cpanel;

use App\Http\Controllers\Controller;
use App\Models\companyservicetype;
use Illuminate\Http\Request;
use Illuminate\View\View;

class servicetypeController extends Controller
{
    //
    public function viewServicesTypeList():View
    {
        $servicesTypes =companyservicetype::get();
        return view("cpanel.pages.companiesservicestypes",compact("servicesTypes"));
    }
}
