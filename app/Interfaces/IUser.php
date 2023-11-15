<?php
namespace App\Interfaces;

use App\Models\User;
use Illuminate\Http\Request; 

interface IUser{
    //Request $re,User $user
    function saveNewUser(Request $request , User $user):bool;
}

?>