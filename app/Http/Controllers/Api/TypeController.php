<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;
use App\Http\Controllers\Api\ResponseController;
use App\Http\Request\TypeChecker;
use App\Http\Resources\Type as TypeResource;

class TypeController extends Controller
{

   public function getTypes(){
      $types = Type::all();
      return;
   }
   public function addType(TypeChecker $request){
      $request->validated();
      $input = $request->all();
      $type = new Type();
  
      $type ->type  = $input["type "];
      $type ->save();
  
  
      }
  public function modifyType(TypeChecker $request){
      $request->validated();
      $input = $request->all();
      $id = $input["id"];
      $type= Type::find($id);
      $type->type = input["type "];
      $type->save();
  
      }
  public function destroyType(){
      $type = Type::find($request["id"]);
      $type ->delete();
      return ;
      }
   public function getTypeId($typeName){
    $type = Type::where("type",$typeName)->first();
    $id = $type->id;

    return $id;
   }
   
}
