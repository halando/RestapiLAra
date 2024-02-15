<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Http\Controllers\Api\ResponseController;
use App\Http\Request\PackageChecker;
use App\Http\Resource\Package as PackageResource;

class PackageController extends Controller
{
    public function getPackages(){
        $package = Package::all();
        return this->sendResponse(PackageResource::collection($packages));
    }
public function addPackage(PackageChecker $request){
    $request->validated();
    $input = $request->all();
    $package = new Package();

    $package->package = $input["package"];
    $package->save();


    }
public function modifyPackage(PackageChecker $request){
    $request->validated();
    $input = $request->all();
    $id = $input["id"];
    $package = Package::find($id);
    $package->package = input["package"];
    $package->save();

    }
public function destroyPackage(){
    $package = Package::find($request["id"]);
    $package->delete();
    return ;
    }
    public function getPackageId($packageName){
        $package = Package::where("package", $packageName)->first();
        $id =$package->id;
        return $id;
    }
}
