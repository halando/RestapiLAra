<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
class PackageController extends Controller
{
    public function getPackageId($packageName){
        $package = Package::where("package", $packageName)->first();
        $id =$package->id;
        return $id;
    }
}
