<?php

namespace App\Http\Controllers;
use Session;

use App\Models\catageries;
use App\Models\CatageriesArbic;
use App\Models\products_arbic;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;


class CatageriesController extends Controller
{
    


    public function index()
    {
        if(Auth::check()){
            return view('dashboard.home');
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }


    public function create()
    {
        if(Auth::check()){
            return view('catageries.add');
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }


    public function store(Request $request)
    {
        if(Auth::check()){

            $filename="";
            if (App::isLocale('en')) {
              $request->validate([
                 'name' => 'required|unique:catageries|max:255',
                 'descrption' => 'required',
                 'image'=>'required',
                 'price'=>'required',

             ]);
             if($request->file('image')){
                     $file= $request->file('image');
                     $filename= date('YmdHi').$file->getClientOriginalName();
                     $file-> move(public_path('public/Image'), $filename);


                 }


                 Catageries::create([
                          'name' =>  $request->name,
                          'descrptions'=>$request->descrption,
                          'image'=>$filename,
                          'price'=>$request->price,

                       ]);
                       return redirect('catageries/show');


             }




             // }
             else if (App::isLocale('ar')) {
                 $request->validate([
                     'name' => 'required|unique:catageries_arbics|max:255',
                     'descrption' => 'required',
                     'image'=>'required',
                     'price'=>'required',

                 ]);

          if($request->file('image')){
                     $file= $request->file('image');
                     $filename= date('YmdHi').$file->getClientOriginalName();
                     $file-> move(public_path('public/Image'), $filename);


                 }


                 CatageriesArbic::create([
                          'name' =>  $request->name,
                          'descrptions'=>$request->descrption,
                          'image'=>$filename,
                          'price'=>$request->price,
                          'image'=>$filename,
                       ]);



                 return redirect('catageries/show');

        }

        return redirect("login")->withSuccess('You are not allowed to access');

        }

    }

    public function show()
    {
        if(Auth::check()){
            if (App::isLocale('en')){
                $x= Catageries::all();
          return view('catageries.show',compact('x'));
           }else{
               $x= CatageriesArbic::all();
               return view('catageries.show',compact('x'));
           }
        }

        return redirect("login")->withSuccess('You are not allowed to access');


    }

    public function edit($id)
    {
        if(Auth::check()){
            if (App::isLocale('en')){
                $i= Catageries::findOrFail($id);
                return view('catageries.edit',compact('i'));
               // return route('/catageries/show');
            }
            if (App::isLocale('ar')){
                $i= CatageriesArbic::findOrFail($id);
                return view('catageries.edit',compact('i'));
            }
        }

        return redirect("login")->withSuccess('You are not allowed to access');




    }


    public function update(Request $request)
    {
        if(Auth::check()){
            if (App::isLocale('en')){
                $filename="";
                if($request->file('image')){
                   $file= $request->file('image');
                   $filename= date('YmdHi').$file->getClientOriginalName();
                   $file-> move(public_path('public/Image'), $filename);
               }
                $c= DB::table('catageries')
                ->where('id',$request->id)
                ->update([
                  'name' =>  $request->name,
                  'descrptions'=>$request->descrption,
                  'image'=>$filename,
          ]);
          return redirect('catageries/show');

            }
            else if (App::isLocale('ar')) {
                $filename="";
                if($request->file('image')){
                   $file= $request->file('image');
                   $filename= date('YmdHi').$file->getClientOriginalName();
                   $file-> move(public_path('public/Image'), $filename);
               }
                $c= DB::table('catageries_arbics')
                ->where('id',$request->id)
                ->update([
                  'name' =>  $request->name,
                  'descrptions'=>$request->descrption,
                  'image'=>$filename,
          ]);
          return redirect('catageries/show');

        }
        return redirect("login")->withSuccess('You are not allowed to access');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if(Auth::check()){
            if (App::isLocale('en')){
                $res= Catageries::where('id',$id)->delete();
                return redirect('catageries/show');

            }
            if (App::isLocale('ar')){
                $res= CatageriesArbic::where('id',$id)->delete();
                return redirect('catageries/show');
            }
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function getproducts($id)
    { if(Auth::check()){
        if (App::isLocale('en')){
            $i = Catageries::findOrFail($id);
            $x= $i->products;
            return view('catageries.show_products',compact('x'));


        }
        if (App::isLocale('ar')){

             $i =CatageriesArbic::findOrFail($id);
             $x= $i->products_ar;

             return view('catageries.show_products',compact('x'));
        }
    }
    return redirect("login")->withSuccess('You are not allowed to access');

    }


}
