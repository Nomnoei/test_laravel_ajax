<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModalController extends Controller
{
    public function index(){
        // session_start();
      // print_r($_SESSION["Recipient"]);
      return view("modal");
  }

    public function modal(Request $request){

        //dd($request->all());
        session_start();
        $_SESSION["houes"][] =  $request->houes;
        $_SESSION["Alley"][] =  $request->Alley;
        $_SESSION["moo"][] =  $request->moo;
        $_SESSION["district"][] =  $request->district;
        //dd($_SESSION["Recipient"]);
        return redirect('modal');




    }
    public function editrow(Request $request){
      session_start();
      //dd($request->all());
    //  print_r($_SESSION["Recipient"]);
      $num = $request->num;
      //echo $num;


      $_SESSION["houes"][$num] =  $request->houes;
      $_SESSION["Alley"][$num] =  $request->Alley;
      $_SESSION["moo"][$num] =  $request->moo;
      $_SESSION["district"][$num] =  $request->district;
      return redirect('modal');
    }

    public function DeleteSesstion(Request $request){
      session_start();
      session_destroy();
      return redirect('modal');
    }

    public function Deleterow($id){
      session_start();
      //dd($id);
       unset($_SESSION["houes"][$id]);
       unset($_SESSION["Alley"][$id]);
       unset($_SESSION["moo"][$id]);
       unset($_SESSION["district"][$id]);
      return redirect('modal');
    }








}
