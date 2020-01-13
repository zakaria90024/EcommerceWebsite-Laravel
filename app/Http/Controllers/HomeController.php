<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Contace;
use App\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $all_contect =  User::all();

        return view('home',compact('all_contect'));

    }
    public function contactmessageview()
    {
      $contactmessages = Contace::all();
      return view('contact/view', compact('contactmessages'));
    }

    public function changemenustatus($category_id)
    {
        if(Category::find($category_id)->menu_status == 0){
          Category::find($category_id)->update([
            'menu_status' => true
          ]);
        }
        else {
          Category::find($category_id)->update([
            'menu_status' => false
          ]);

        }
      return back();


    }

}
