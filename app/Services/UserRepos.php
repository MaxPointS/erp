<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request; 
use App\Interfaces\IUser as UserInterface;
use Illuminate\Support\Facades\Hash;

 class UserRepos implements UserInterface{

   protected $table = "users";
    function saveNewUser(Request $request , User $user):bool{
        $request->validate([
            "name"=>['string',"required","unique:Users"],
            "email"=>["email","required"]
        ]);

        $user = User::updateOrCreate([
            "name"=>$request->name,
            "email"=>"space@gmail.com",
            "role_id"=>1,
            "password"=>Hash::make(123),
        ]);

        return true;
    }
}

?>