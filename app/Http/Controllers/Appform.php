<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Appform extends Controller
{
    public function index(Request $request){

        return view("addform");
    }

    public function add(Request $request){

        //return view("addform");
        session(['num' => session('num')+1]);
      //  dd(session('num'));
      return view("addform");
    }

    public function delete(){
      session(['num' => session('num')-1]);
      return view("addform");
    }

    public function alldelete(){
      session()->flush();
      return view("addform");
    }

    public function data(Request $request){
        dd($request->all());
    }
}
