<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        // dd($request->session());
        if($request->session()->exists('user')){
            return redirect('/task');
        }else{
            return redirect('/login');
        }
    }
}
