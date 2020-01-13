<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\FinalAddress;
use App\Cart;

class DynamicDependent extends Controller
{



              function index()
            {
                 $country_list = DB::table('division_zilla_upzilla')
                     ->groupBy('division')
                     ->get();


                $curier_lists = DB::table('add_contegories')
                         ->groupBy('courier')
                         ->get();

                $payment_methods = DB::table('add_contegories')
                        ->groupBy('payment_method')
                        ->get();


                 $card_items = Cart::where('customar_ip', $_SERVER['REMOTE_ADDR'])->get();

                 return view('dynamic_dependent', compact('curier_lists','card_items', 'payment_methods'))->with('country_list', $country_list);
            }


            function fetch(Request $request)
            {
                 $select = $request->get('select');
                 $value = $request->get('value');
                 $dependent = $request->get('dependent');
                 $data = DB::table('division_zilla_upzilla')
                   ->where($select, $value)
                   ->groupBy($dependent)
                   ->get();

                 $output = '<option value="">Select '.ucfirst($dependent).'</option>';
                 foreach($data as $row)
                 {
                  $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
                 }
                 echo $output;





            }




            public function addcityinsert(Request $request)
            {

              print_r($request-> all());

              $request->validate([

                                      'f_name' => 'required',
                                      'l_name' => 'required',

                                      'phn_number' => 'required|numeric',
                                      'alt_phn_number' => 'required|numeric',
                                      'email' => 'required',

                                      'division' => 'required',
                                      'zilla' => 'required',
                                      'upzilla' => 'required',

                                      'curier_name' => 'required',
                                      'curiare_ditails' => 'required',

                                      'payment_method' => 'required',
                                      'sender_number' => 'required|numeric',
                                      'translation_number' =>'required|numeric',

                                ]);




                      $last_get_id = FinalAddress::insertGetId(
                      [

                        'f_name' => $request->f_name,
                        'l_name' => $request->l_name,

                        'phn_number' => $request->phn_number,
                        'alt_phn_number' => $request->alt_phn_number,
                        'email' => $request->email,

                        'division' => $request->division,
                        'zilla' => $request->zilla,
                        'upzilla' => $request->upzilla,

                        'curier_name' => $request->curier_name,
                        'curiare_ditails' => $request->curier_adds,

                        'payment_method' => $request->payment_method,
                        'sender_number' => $request->sender_number,
                        'translation_number' => $request->translation_number,

                      ]);


            }
}
