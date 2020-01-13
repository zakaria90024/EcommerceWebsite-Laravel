<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Image;
use App\Category;

class ProductControler extends Controller
{
    public function p_controler(){
        //return view('product/view');
        $products = Product::paginate(3);

        $deleted_products =  Product::onlyTrashed()->get();

        $categories = Category::all();

        return view('product/view',compact('products', 'deleted_products','categories'));
    }

    public  function  p_insert(Request $request){
       // print_r($request-> all());
       // echo $request->product_name;
       // echo $request->product_discreption;
        //echo $request->product_price;
       // echo $request->product_quantity;
        //echo $request->alart_quantity;

        $request->validate([

            'product_name' => 'required',
            'category_id' => 'required',
            'product_discreption' => 'required',
            'product_price' => 'required|numeric',
            'product_quantity' => 'required|numeric',
            'alart_quantity' => 'required|numeric',


        ]);

        $last_get_id = Product::insertGetId(
        [

            'product_name' => $request->product_name,
            'category_id' => $request->category_id,
            'product_discreption' => $request->product_discreption,
            'product_price' => $request->product_price,
            'product_quantity' => $request->product_quantity,
            'alart_quantity' => $request->alart_quantity,


        ]);
        //echo $last_get_id;

        if($request->hasFile('product_image')){
            $photo_to_upload = $request->product_image;
            $filename = $last_get_id.".".$photo_to_upload->getClientOriginalExtension();
           // print_r($photo_to_upload->getClientOriginalExtension());
            //print_r($filename);
            Image::make($photo_to_upload)->resize(400,450)->save(base_path('public/uploads/product_photo/'.$filename));
            Product::find($last_get_id)->update([
               'product_image' => $filename

            ]);

        }

       return back() -> with('status', 'This is Successfully Added');

    }



    public function delete_product($product_id){
       // echo $product_id;
       // Product::where(id, $product_id)->delete();
        Product::find($product_id)->delete();

        return back()-> with('deletestatus', 'This is uccessfully Deleted');
    }


    public function edit_product($product_id){
        // echo $product_id;
        // Product::where(id, $product_id)->delete();
        //Product::find($product_id)->delete();
       $simple_product_info = Product::findOrFail($product_id);
       return view('product/edit', compact('simple_product_info'));

    }

    public function edit_product_insert(Request $request){


        if($request->hasFile('product_image')){
            if(Product::find($request->product_id)->product_image == 'defaultproductphoto.jpg') {
                $photo_to_upload = $request->product_image;
                $filename = $request->product_id.".".$photo_to_upload->getClientOriginalExtension();
                // print_r($photo_to_upload->getClientOriginalExtension());
                //print_r($filename);
                Image::make($photo_to_upload)->resize(400, 450)->save(base_path('public/uploads/product_photo/'.$filename));
                Product::find($request->product_id)->update([
                    'product_image' => $filename

                ]);
            }
            else{
                //first delete the old photo and insert new one
                $delete_this_file = Product::find($request->product_id)->product_image;
                unlink(base_path('public/uploads/product_photo/'.$delete_this_file));

                //Upload new one
                $photo_to_upload = $request->product_image;
                $filename = $request->product_id.".".$photo_to_upload->getClientOriginalExtension();
                // print_r($photo_to_upload->getClientOriginalExtension());
                //print_r($filename);
                Image::make($photo_to_upload)->resize(400, 450)->save(base_path('public/uploads/product_photo/'.$filename));
                Product::find($request->product_id)->update([
                    'product_image' => $filename

                ]);
            }


        }
        Product::find($request->product_id)->update([

            'product_name' => $request->product_name,
            'product_discreption' => $request->product_discreption,
            'product_price' => $request->product_price,
            'product_quantity' => $request->product_quantity,
            'alart_quantity' => $request->alart_quantity,

        ]);
        return back()-> with('status', 'Edit Successful');
    }

   public function restore_product($product_id){

        Product::onlyTrashed()-> where('id', $product_id)->restore();
        return back();
    }

    public function parmanentdelete_product($product_id){


        $delete_this_file = Product::onlyTrashed()->find($product_id)->product_image;
        unlink(base_path('public/uploads/product_photo/'.$delete_this_file));

        Product::onlyTrashed()-> find($product_id)->forceDelete();
        return back();

    }
}
