<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Drink;
use App\Http\Controllers\Api\ResponseController;
use App\Http\Resources\Drink as DrinkResource;
use App\Http\Requests\DrinkChecker;


class DrinkController extends ResponseController
{
    public function getDrinks(){
        $drinks = Drink::with("type","package")->get();
        if(is_null($drink)){
            return $this->sendError("Hiba a lekérdezésnél");
        }
        return $this->sendResponse(DrinkResource::collection ($drinks), "Betöltve");
    }
    public function getOneDrink(Request $request){
        $name=  $request->get("drink");
        $drink = Drink::with("type","package")->where("drink", $name)->first();
        if(is_null($drink)){
            return $this->sendError("Nincs ilyen ital");
        }

        return $this->sendResponse(DrinkResource::make ($drink), "Betöltve");
    }
     public function addDrink(DrinkChecker $request){
        $request->validated();
        $input=  $request->all();
        $drink = neW Drink;
        $drink->drink= $input["drink"];
        $drink->amount= $input["amount"];
        $drink->type_id= (new TypeController)->getTypeId($input["type"]);
        $drink->package_id= (new PackageController)->getPackageId($input["package"]);

        $drink->save();
        return $this->sendResponse(DrinkResource::make ($drink), "Kiírva");
    }
    
    public function modifyDrink(DrinkChecker $request){

        $request->validated();
        $input= $request->all();
        $drink = Drink::find($input["id"]);

        $drink->drink = $input["drink"];
        $drink->amount = $input["amount"];
        $drink->type_id= (new TypeController)->getTypeId($input["type"]);
        $drink->package_id= (new PackageController)->getPackageId($input["package"]);

        $drink->save();
        return $this->sendResponse(DrinkResource::make ($drink), "Módosítva");
    }
        public function destroyDrink(Request $request){
            $drink =  $request->all();  
            $id = $drink["id"];
            $drink = Drink::find($id);
            
            if(is_null($drink)){
                return $this->sendError("Nincs ilyen ital");
            }
            $drink->delete();
            return $this->sendResponse(DrinkResource::make ($drink), "Törölve");
        }

        public function failedValidation(Validator $validator){
            throw new HttpResponseException(response()->json([
                "success"=>false,
                "message"=>"Adatbeviteli hiba",
                "data"=>$validator->errors()
            ]));
        }

}
