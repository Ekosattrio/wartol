<?php

namespace App\Http\Controllers\Penjual;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(){
        return view('/penjual/');
    }

    public function status(){

    }

    public function showInvoice(){
    }
    
    public function store(Request $request){
       //store ke db
    }

    
}
