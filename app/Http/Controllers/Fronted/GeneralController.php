<?php

namespace App\Http\Controllers\Fronted;

use App\Interfaces\UserInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator,Auth,Artisan,Hash,File,Crypt;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Models\Contact_us;
use App\Http\Controllers\Manage\EmailsController;

class GeneralController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function media (){
        $media=Media::where('status',1)->where('image','!=',null)->paginate(36);
        $title='المركز الاعلامي';
        $folder='Compounds';
        return view('Fronted.GeneralPages.media',compact('media','title','folder'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function volunteer(){
        return view('Fronted.GeneralPages.volunteer');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function contacts(){
        return view('Fronted.GeneralPages.contacts');
    }

    public function about_coach(){
        return view('Fronted.GeneralPages.about_coach');

    }



    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function contact_us(Request $request){
        $contact=new Contact_us();
        $contact->name=$request->name;
        $contact->email=$request->email;
        $contact->massage=$request->massage;
        $contact->save();
        return response()->json(['status'=>1,'message'=>'your massage has been sent,we will contact you shortly']);
    }
}
