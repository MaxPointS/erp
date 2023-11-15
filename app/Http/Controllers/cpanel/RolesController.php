<?php

namespace App\Http\Controllers\cpanel;

use App\Http\Controllers\Controller;
use App\Models\role;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RolesController extends Controller
{
    //
    public function viewRolesList():View
    {
        $roles = role::get();
        return view("cpanel.pages.roles",compact("roles"));
    }
}
