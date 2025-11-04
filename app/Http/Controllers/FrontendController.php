<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        return view('index');
    }

    public function fillphonenumber(Request $request){
        return redirect('/payment');
        //else gagal
    }

    
}
