<?php

namespace App\Http\Controllers;

use App\Media\Media;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;


class ProductController extends Controller
{
    public function index(){
        $products = DB::table('products')->get();
        return view('product',compact('products'));
    }
    public function create(){
        $brands =DB::table('brands')->select('id','name_en')->get();
        $subcategories=DB::table('subcategories')->select('id','name_en')->get();
              return view('create',compact('brands','subcategories'));

    }
    public function store(StoreProductRequest $request){

        $newImage = Media::upload($request->file('image'),public_path('images/prodcuts'));
        $data=$request->except('image','_token');
        $data['image']=$newImage;
        if(DB::table('products')->insert($data)){
            return redirect()->route('dashboard.products.index')->with('success',"Data inserted");
        } else{
            return redirect()->back()->with('error',"Some Thing Wrong");

        }


    }
    public function edit(Product $product){

        $brands =DB::table('brands')->select('id','name_en')->get();
        $subcategories=DB::table('subcategories')->select('id','name_en')->get();
              return view('edit',compact('brands','subcategories','product'));
    }


    public function update(UpdateProductRequest $request,Product $product){
        $data=$request->except('image','_token','_method');

        if($request->has('image')){
            $newImage = Media::upload($request->file('image'),public_path('images/prodcuts'));
            $data['image']=$newImage;
            $oldimage = DB::table('products')->select('image')->where('id',$product->id)->first()->image;
            $patholdimage= public_path('images/products/'.$oldimage);
            Media::delete($patholdimage);


        }
        if(DB::table('products')->where('id',$product->id)->update($data)){
            return redirect()->route('dashboard.products.index')->with('success',"Data Updated");
        } else{
            return redirect()->back()->with('error',"Some Thing Wrong");

        }



    }
    public function delete(Product $product){

        $oldimage = DB::table('products')->select('image')->where('id',$product->id)->first()->image;
        $patholdimage= public_path('images/products/'.$oldimage);
        Media::delete($patholdimage);
        if(DB::table('products')->where('id',$product->id)->delete()){
            return redirect()->back()->with('success',"The Product Deleted");
        } else{
            return redirect()->back()->with('error',"Some Thing Wrong");

        }


    }


}
