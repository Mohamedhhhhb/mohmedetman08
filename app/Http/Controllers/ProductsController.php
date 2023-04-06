<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\App;
use App\Models\CatageriesArbic;
use App\Models\products;
use Illuminate\Http\Request;
use App\Models\catageries;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductsArbic;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Auth::check()){
            if (App::isLocale('en')) {
                $x= Catageries::all();
                return view('products.add',compact('x'));
            }elseif (App::isLocale('ar')) {
                $x= CatageriesArbic::all();
                return view('products.add',compact('x'));
            }
        }
        return redirect("login")->withSuccess('You are not allowed to access');










    }


    public function store(Request $request)
    { if(Auth::check()){

        if (App::isLocale('en')) {
            $request->validate([
                'name' => 'required|unique:products|max:255',
                'descrption' => 'required',
                'image'=>'required',
                'price'=>'required',
                'Section'=>'required'

            ]);

            $filename="";
            if($request->file('image')){
               $file= $request->file('image');
               $filename= date('YmdHi').$file->getClientOriginalName();
               $file-> move(public_path('public/Image'), $filename);
           }
           Products::create([
                    'name' =>  $request->name,
                    'descrptions'=>$request->descrption,
                    'image'=>$filename,
                    'price'=>$request->price,
                    'catageries_id'=>$request->Section,
                 ]);

           return redirect()->back();
        }
        elseif (App::isLocale('ar')) {
            $request->validate([
                'name' => 'required|unique:products_arbics|max:255',
                'descrption' => 'required',
                'image'=>'required',
                'price'=>'required',
                'Section'=>'required'

            ]);

            $filename="";
            if($request->file('image')){
               $file= $request->file('image');
               $filename= date('YmdHi').$file->getClientOriginalName();
               $file-> move(public_path('public/Image'), $filename);
           }
           DB::table('products_arbics')->insert(
            array(
                'name' =>  $request->name,
                'descrptions'=>$request->descrption,
                'price'=>$request->price,
                'catageries_arbic_id'=>$request->Section,
                'image'=>$filename,
            )
       );


           return redirect()->back();
        }
    }
    return redirect("login")->withSuccess('You are not allowed to access');






    }


    public function show()
    {
        if(Auth::check()){
            if (App::isLocale('en')) {
                $p=Products::all();
                return view('products.show',compact('p'));
            }
            if (App::isLocale('ar')) {
                $p=ProductsArbic::all();
               // return $p;//->section_ar;
                return view('products.show',compact('p'));

            }
        }
        return redirect("login")->withSuccess('You are not allowed to access');




        }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if(Auth::check()){
            if (App::isLocale('en')){
                $i= Products::findOrFail($id);
                $x=Catageries::all();

                   return view('products.edit',compact('i','x'));
            }
            else if (App::isLocale('ar')) {
                $i= ProductsArbic::findOrFail($id);
               // $i= DB::table('ProductsArbics')->where('id', $id)->first();
                $x=CatageriesArbic::all();
                   return view('products.edit',compact('i','x'));


        }

        }
        return redirect("login")->withSuccess('You are not allowed to access');








    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, products $products)
    { if(Auth::check()){
        if (App::isLocale('en')){
            $request->validate([
                'name' => 'required|max:255',
                'descrption' => 'required',
                'image'=>'required',
                'price'=>'required',
                'Section'=>'required'

            ]);

            $filename="";
            if($request->file('image')){
               $file= $request->file('image');
               $filename= date('YmdHi').$file->getClientOriginalName();
               $file-> move(public_path('public/Image'), $filename);
           }
            $c= DB::table('products')
            ->where('id',$request->id)
            ->update([
              'name' =>  $request->name,
              'descrptions'=>$request->descrption,
              'catageries_id'=>$request->Section,
              'price'=>$request->price,
              'image'=>$filename,
      ]);

      return redirect('products/show');
        }
        else {
            $request->validate([
                'name' => 'required|max:255',
                'descrption' => 'required',
                'image'=>'required',
                'price'=>'required',
                'Section'=>'required'

            ]);

            $filename="";
            if($request->file('image')){
               $file= $request->file('image');
               $filename= date('YmdHi').$file->getClientOriginalName();
               $file-> move(public_path('public/Image'), $filename);
           }
            $c= DB::table('products_arbics')
            ->where('id',$request->id)
            ->update([
              'name' =>  $request->name,
              'descrptions'=>$request->descrption,
              'catageries_arbic_id'=>$request->Section,
              'image'=>$filename,
              'price'=>$request->price,
      ]);

      return redirect('products/show');
        }

    }
    return redirect("login")->withSuccess('You are not allowed to access');






    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        if(Auth::check()){
            if (App::isLocale('en')){
                $res= Products::where('id',$id)->delete();
                return redirect('products/show');

            }
            if (App::isLocale('ar')){
                $res=ProductsArbic::where('id',$id)->delete();
                return redirect('products/show');

            }
        }
        return redirect("login")->withSuccess('You are not allowed to access');




    }

}
