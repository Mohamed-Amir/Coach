<?php

namespace App\Http\Controllers\Fronted;

use App\Interfaces\UserInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator,Auth,Artisan,Hash,File,Crypt;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Http\Controllers\Manage\EmailsController;
use Symfony\Component\Console\Input\Input;

class UserController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function sign_in  (){
        return view('Fronted.User.signin');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logged(Request $request)
    {
        $userdata = [
            'email' => $request['email'],
            'password' => $request['password'],
        ];
        // attempt to do the login
        if (Auth::attempt($userdata))
        {
            return response()->json(['status'=>1,'message'=>'log in success']);

        }
        else
        {
            // validation not successful, send back to form
            return Redirect::to('checklogin');
        }
    }


public function myProfile()
{
    return view('Fronted.User.my_profile');
}
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function sign_up  (){
        return view('Fronted.User.signup');
    }



    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveUser(Request $request){
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->password=Hash::make($request->password);
        $user->save();
        Auth::login($user);
        return response()->json(['status'=>1,'message'=>'registration success']);
    }


}
