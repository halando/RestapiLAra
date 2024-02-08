<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;

class TypeController extends Controller
{
   public function getTypeId($typeName){
    $type = Type::where("type",$typeName)->first();
    $id = $type->id;

    return $id;
   }
   
}
