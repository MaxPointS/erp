<?php

namespace App\Http\Controllers\cpanel;

use App\Http\Controllers\Controller;
use App\Models\role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class usersController extends Controller
{
    //
    public function viewUsersList()//:View
    {
        $users= User::with("role")->with("permissions")->get();
        // return $users;
        return view("cpanel.pages.users",compact('users'));
    }
}
