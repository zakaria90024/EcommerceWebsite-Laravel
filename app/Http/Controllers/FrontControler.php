<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Contace;
use Mail;
use App\Mail\ContactMessage;
use Carbon\Carbon;
use App\Cart;
use App\AddContegory;

use DB;

class FrontControler extends Controller
{
    public function contect(){

        return view('contect');

    }
    public function  index(){
        $products = Product::all();
        $categories = Category::all();

        return view('welcome',compact('products', 'categories'));
    }


    public function productditails($product_id){

        //return view('frontend/productdetails');

        $single_product_info = Product::find($product_id);
        $related_products  = Product::where('id','!=',$product_id)->where('category_id', $single_product_info->category_id)->get();


        return view('frontend/productdetails',compact('single_product_info', 'related_products'));


    }
    public function categorywiseprodudcts($category_id)
    {
      $products = Product::where('category_id', $category_id)->get();
      return view('frontend/categorywiseprodudcts', compact('products'));
    }

    public function contactinsert (Request $request)
    {
      //Mail sent contact page
      $first_name = $request->first_name;
      $message = $request->message;


      Contace::insert($request->except('_token'));
      Mail::to('zakaria112203@gmail.com')->send(new ContactMessage($first_name,$message));
      //retuen redirect('link here');
      return back()->withZakaria("Message send successfully");
    }

    public function addtocart($product_id)
    {
      $ip_address = $_SERVER['REMOTE_ADDR'];
      if(Cart::where('customar_ip', $ip_address)->where('product_id',$product_id)->exists()){
        Cart::where('customar_ip', $ip_address)->where('product_id',$product_id)->increment('product_quantity', 1);

      }
      else{

        Cart::insert([
          'customar_ip' => $ip_address,
          'product_id' => $product_id,

          'created_at' => Carbon::now()
        ]);


      }
        return back();
    }

    public function cart()
    {
      $card_items  =  Cart::where('customar_ip', $_SERVER['REMOTE_ADDR'])->get();
      return view('frontend/cart', compact('card_items'));
    }

    public function deletefromcart($cart_id)
    {
      Cart::find($cart_id)->delete();
      return back();
    }

    public function clearcart()
    {
      Cart::where('customar_ip', $_SERVER["REMOTE_ADDR"])->delete();
      return back();
    }


    public function checkoutshipping()
    {
      $card_items = Cart::all();



      //echo $country_lists =  DB::table('division_zilla_upzilla')->groupBy('division')->get();

      //return view('frontend/checkoutshipping')->with('country_list', $country_lists);

      //echo $dropwodn_items =  AddContegory::all();



      return view('frontend/checkoutshipping', compact('card_items','country_lists'));
    }










}
