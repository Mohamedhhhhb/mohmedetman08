<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Models\CatageriesArbic;
use App\Models\Catageries;
class HomeController extends Controller
{

    function index (){


            if (App::isLocale('en')){
                $x= Catageries::all();
                return view('front-end.index',compact('x'));
            }
            else {
                $x= CatageriesArbic::all();
                return view('front-end.pageAR',compact('x'));
            }


    }
    function show ($id){


                if (App::isLocale('en')){
                    $i = Catageries::findOrFail($id);
                    $x= $i->products;
                    return view('front-end.category',compact('x'));
                }
                if (App::isLocale('ar')){
                             $i =CatageriesArbic::findOrFail($id);
                             $x= $i->products_ar;
                             return view('front-end.category',compact('x'));
                        }


        }


}
