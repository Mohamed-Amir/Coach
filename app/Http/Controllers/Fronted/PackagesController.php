<?php

namespace App\Http\Controllers\Fronted;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator,Auth,Artisan,Hash,File,Crypt;
use App\Models\Packages;
use App\Http\Controllers\Manage\EmailsController;


class PackagesController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
   public function allPackages()
   {
       $packages=Packages::take(3)->get();
       return view('Fronted.Packages.allPackages',compact('packages'));
   }

    public function singlePackage($id)
        {
        $Package = Packages::where('id',$id)->first();
        if (!is_null($Package)) {
            return view('Fronted.Packages.more_info',compact('Package'));
        }
    }
}
