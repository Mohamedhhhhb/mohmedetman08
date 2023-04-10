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

                $x= Catageries::all();
                $y= CatageriesArbic::all();
                return view('products.add',compact('x','y'));


               // return view('products.add',compact('x'));

            }
        return redirect("admin")->withSuccess('You are not allowed to access');










    }


    public function store(Request $request)
    {
        //return $request;
        if(Auth::check()){


            $request->validate([
                'name_en' => 'required|unique:products|max:255',
                'name_ar' => 'required|unique:products_arbics|max:255',
                'description_ar' => 'required',
                'description_en' => 'required',
                'image'=>'required',
                'price'=>'required',
                'section'=>'required'
            ]);
          //  return $request ;
           // return "rvfvv";

            $filename="";
            if($request->file('image')){
               $file= $request->file('image');
               $filename= date('YmdHi').$file->getClientOriginalName();
               $file-> move(public_path('public/Image'), $filename);
           }
           Products::create([
                    'name_en' =>  $request->name_en,
                    'descrptions_en'=>$request->description_en,
                    'image'=>$filename,
                    'price'=>$request->price,
                    'catageries_id'=>$request->section,
                 ]);




             //    INSERT INTO `products_arbics` (`id`, `name_ar`, `price`, `image`, `descrptions_ar`
             //, `catageries_arbic_id`, `created_at`, `updated_at`)
             // VALUES (NULL, 'fqf', 'fqwfqf', 'rfre', 'rffr', '3', NULL, NULL);












                //  ProductsArbic::create([
                //     'name_ar' =>  $request->name_ar,
                //     'descrptions_ar'=>$request->description_ar,
                //     'image'=>$filename,
                //     'price'=>$request->price,
                //     'catageries_arbic_id'=>'4',
                //  ]);
               // return $request ->section;
              //$t=$request ->section;
             //  return $t;
           DB::table('products_arbics')->insert(
            array(
                'name_ar' =>  $request->name_ar,
                'descrptions_ar'=>$request->description_ar,
                'price'=>$request->price,
                'catageries_arbic_id'=>$request->section,
                'image'=>$filename,
            )
       );


           return redirect('/products/show');
        }

    return redirect("admin")->withSuccess('You are not allowed to access');






    }


    public function show()
    {
        if(Auth::check()){

                $p=Products::all();
                $x=ProductsArbic::all();

                return view('products.show',compact('p','x'));


        }
        return redirect("admin")->withSuccess('You are not allowed to access');




        }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if(Auth::check()){
                $i=Products::findOrFail($id);
                $i1=ProductsArbic::findOrFail($id);
                $x=Catageries::all();
                $x1=CatageriesArbic::all();

                   return view('products.edit',compact('i','x','x1','i1'));
        }
        return redirect("admin")->withSuccess('You are not allowed to access');








    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, products $products)
    { if(Auth::check()){

            // $request->validate([
            //     'name_en' => 'required|max:255',
            //     'descrption_en' => 'required',
            //     'image'=>'required',
            //     'price'=>'required',
            //     'section'=>'required'

            // ]);

            $filename="";
            if($request->file('image')){
               $file= $request->file('image');
               $filename= date('YmdHi').$file->getClientOriginalName();
               $file-> move(public_path('public/Image'), $filename);
           }
            $c= DB::table('products')
            ->where('id',$request->id)
            ->update([
              'name_en' =>  $request->name_en,
              'descrptions_en'=>$request->description_en,
              'catageries_id'=>$request->section,
              'price'=>$request->price,
              'image'=>$filename,
      ]);

            $c= DB::table('products_arbics')
            ->where('id',$request->id1)
            ->update([
              'name_ar' =>  $request->name_ar,
              'descrptions_ar'=>$request->description_ar,
              'catageries_arbic_id'=>$request->section,
              'image'=>$filename,
              'price'=>$request->price,
      ]);
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
                $res= Products::where('id',$id)->truncate();
                return redirect('products/show');

            }
            if (App::isLocale('ar')){
                $res=ProductsArbic::where('id',$id)->truncate();
                return redirect('products/show');

            }
        }
        return redirect("admin")->withSuccess('You are not allowed to access');




    }

}
