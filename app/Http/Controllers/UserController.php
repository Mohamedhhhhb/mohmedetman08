<?php

namespace App\Http\Controllers;
use App\Http\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{

    function index () {
        return view('user.login');
    }
    function login (Request $request) {

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

  $user = DB::table('users')->where('email',$request->email)->first();
  if($user) {
  //  $user = User::whereName($user)->wherePassword(Hash::make($password))->first();
    //return $user ;
    $pass = Hash::check($request->password,$user->password);
    if ($pass) {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/dashboard');
        }

        return redirect("login")->withSuccess('Login details are not valid');
    }
    session()->flash('errors', 'PASS IS NOT CORECT');
  return back();
  }
  session()->flash('errors', 'USER IS NOT CORECT OR PASSWORD');
  return back();
    }
    function show (){
         if(Auth::check()){
            return view('front-end.pageAR');
        }

        return redirect("login")->withSuccess('You are not allowed to access');

    }

    // public function getproducts($id)
    // { if(Auth::check()){
    //     if (App::isLocale('en')){
    //         $i = Catageries::findOrFail($id);
    //         $x= $i->products;
    //         return view('catageries.show_products',compact('x'));


    //     }
    //     if (App::isLocale('ar')){

    //          $i =CatageriesArbic::findOrFail($id);
    //          $x= $i->products_ar;

    //          return view('catageries.show_products',compact('x'));
    //     }
    // }
    // return redirect("login")->withSuccess('You are not allowed to access');

    // }


    //
}
