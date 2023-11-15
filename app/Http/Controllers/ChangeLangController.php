<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;

use function PHPUnit\Framework\isEmpty;

class ChangeLangController extends Controller
{
    //
    public function ChangeLangauge(Request $request){
        
        if($request->has("lang") )
            session()->put('locale',$request->lang );
        else
            session()->put('locale', 'en');
        
        return redirect()->back();
    }
}
