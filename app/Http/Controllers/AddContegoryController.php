<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\AddContegory;

class AddContegoryController extends Controller
{
    public function addaddressview()
    {
      return view('frontend.addcategoryview');
    }

    public function addinsert(Request $request )
    {
      print_r($request->all());



              $request->validate([

                  'payment_method' => 'required',

                  'add_courier' => 'required',



              ]);

              $request = AddContegory::insert(
              [

                  'payment_method' => $request->payment_method,

                  'courier' => $request->add_courier,


              ]);

             return back() -> with('status', 'This is Successfully Added');



    }
}
