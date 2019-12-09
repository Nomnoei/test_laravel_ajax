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

        //dd($request->Recipient);
        session_start();
        $_SESSION["Recipient"][] =  $request->Recipient;
        $_SESSION["Message"][] =  $request->Message;
        //dd($_SESSION["Recipient"]);
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
       unset($_SESSION["Recipient"][$id]);
       unset($_SESSION["Message"][$id]);
      return redirect('modal');
    }

    public function editrow(Request $request){
      session_start();
    //  dd($request->all());
    //  print_r($_SESSION["Recipient"]);
      $num = $request->num;
      //echo $num;
       $_SESSION["Recipient"][$num] = $request->Recipient;
      $_SESSION["Message"][$num] = $request->Message;
      return redirect('modal');
    }






}
