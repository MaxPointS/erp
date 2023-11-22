<?php

namespace App\Http\Controllers\cpanel;

use App\Http\Controllers\Controller;
use App\Models\carcolor;
use App\Models\carcondition;
use App\Models\carfactory;
use App\Models\carfactoryclass;
use App\Models\carfuel;
use App\Models\carlicencetype;
use App\Models\carshape;
use Illuminate\Http\Request;
use Illuminate\View\View;

class settings extends Controller
{
    //
    public function viewCarLicenseTypePage():View{
        $carlicensetypes=carlicencetype::all();
        return view("cpanel.pages.carlicensetype",compact("carlicensetypes"));
    }
    public function viewCarFactory():View{
        $carfactories=carfactory::all();
        return view("cpanel.pages.carfactory",compact("carfactories"));

    }

    public function viewCarFactoryClass():View{
        $carfactoryclasses=carfactoryclass::all();
        return view("cpanel.pages.carfactoryclasses",compact("carfactoryclasses"));

    }

    public function viewCarShape():View{
        $carshapes=carshape::all();
        return view("cpanel.pages.carshapes",compact("carshapes"));

    }

    public function viewCarColor():View{
        $carcolors=carcolor::all();
        return view("cpanel.pages.carcolors",compact("carcolors"));

    }

    public function viewCarFuel():View{
        $carfuels=carfuel::all();
        return view("cpanel.pages.carfuel",compact("carfuels"));

    }

    public function viewCarCondition():View{
        $carconditions=carcondition::all();
        return view("cpanel.pages.carconditions",compact("carconditions"));

    }


    
}
