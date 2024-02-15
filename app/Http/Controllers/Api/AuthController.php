<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\ResponseController;
use App\Http\Requests\UserRegisterChecker;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends ResponseController
{
    public function register(UserRegisterChecker $request){
        $request->validated();
        $input = $request->all();
        $input["password"] = bcrypt($input["password"]);
        $user = User::create($input);
        $success["name"] = $user->name;


        return $this->sendResponse($success,"Sikeres regisztráció");
    }

 public function login(){
        
    }

    public function logout(){
        
    }




}
/*php artisan make: request DrinkChecker
composer require laravel/sanctum
php artisan make:migration add_banningdata_to_users_table
show columns from users
show columns from personal_access_tokens;
*/ 