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
        return redirect("admin")->withSuccess('You are not allowed to access');
    }


    public function create()
    {
        if(Auth::check()){
            return view('catageries.add');
        }

        return redirect("admin")->withSuccess('You are not allowed to access');
    }


    public function store(Request $request)
    {
        if(Auth::check()){

            $filename="";

              $request->validate([
                'name_en' => 'required|unique:catageries|max:255',
               'name_ar' => 'required|unique:catageries_arbics|max:255',
                'description_en' => 'required',
                'description_ar' => 'required',
                 'image'=>'required',
                 'price'=>'required',

             ]);
            // return $request;
             if($request->file('image')){
                     $file= $request->file('image');
                     $filename= date('YmdHi').$file->getClientOriginalName();
                     $file-> move(public_path('public/Image'), $filename);

                 }
                 Catageries::create([
                          'name_en' =>  $request->name_en,
                          'descrptions_en'=>$request->description_en,
                          'image'=>$filename,
                          'price'=>$request->price,

                       ]);
                 CatageriesArbic::create([
                          'name_ar' =>  $request->name_ar,
                          'descrptions_ar'=>$request->description_ar,
                          'image'=>$filename,
                          'price'=>$request->price,
                          'image'=>$filename,
                       ]);

                 return redirect('catageries/show');

        }

        return redirect("admin")->withSuccess('You are not allowed to access');

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

        return redirect("admin")->withSuccess('You are not allowed to access');


    }

    public function edit($id)
    {
        if(Auth::check()){

                $i= Catageries::findOrFail($id);


                $x= CatageriesArbic::findOrFail($id);
                return view('catageries.edit',compact('i','x'));

        }

        return redirect("admin")->withSuccess('You are not allowed to access');




    }


    public function update(Request $request)
    {
        if(Auth::check()){

                $filename="";
                if($request->file('image')){
                   $file= $request->file('image');
                   $filename= date('YmdHi').$file->getClientOriginalName();
                   $file-> move(public_path('public/Image'), $filename);
               }
                DB::table('catageries')
                ->where('id',$request->id1)
                ->update([
                  'name_en' =>  $request->name_en,
                  'descrptions_en'=>$request->description_en,
                  'image'=>$filename,
                  'price'=>$request->price
          ]);

                DB::table('catageries_arbics')
                ->where('id',$request->id2)
                ->update([
                  'name_ar' =>  $request->name_ar,
                  'descrptions_ar'=>$request->description_ar,
                  'image'=>$filename,
                  'price'=>$request->price
          ]);
          return redirect('catageries/show');
        }
        return redirect("admin")->withSuccess('You are not allowed to access');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if(Auth::check()){
            if (App::isLocale('en')){
                $res= Catageries::where('id',$id)->truncate();
                return redirect('catageries/show');

            }
            if (App::isLocale('ar')){
                $res= CatageriesArbic::where('id',$id)->truncate();
                return redirect('catageries/show');
            }
        }
        return redirect("admin")->withSuccess('You are not allowed to access');
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
    return redirect("admin")->withSuccess('You are not allowed to access');

    }


}
