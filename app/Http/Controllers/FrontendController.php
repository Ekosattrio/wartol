<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        return view('index');
    }

    public function sendOtp(Request $request){
        return redirect('/verify-otp');
    }

    public function showOtpForm(){
        return view('verify-otp');
    }


    public function verifyOtp(Request $request){
        
        return redirect('/payment');
        //else gagal =
    }

    
}
