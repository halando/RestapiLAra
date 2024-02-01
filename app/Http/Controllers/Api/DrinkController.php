<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Drink;

class DrinkController extends Controller
{
    public function getDrinks(){
        $drinks = Drink::with("type","package")->get();
        return $drinks;
    }
}
