<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Product;

class ProductController extends Controller
{
    function savedata(Request $request){
        $image = $request->file('image');
      
        if ($request->hasFile('image')) { 
           $name = time().'.'.$image->getClientOriginalExtension();
           $destinationPath = public_path('/images');
           $image->move($destinationPath, $name);
           $data = Product::create(['pname'=>$request->pname,
                                      'desc'=>$request->desc,
                                      'psku'=>$request->psku,
                                      'qty'=>$request->qty,
                                         'image'=>$name,
                                           ]);
        } 
       
       return redirect::back()->with('success', 'Product Added Successfully');
   } 
    function show(){
        $products = Product::all();
        return view('dashboard',['products'=>$products]);
    }
}
