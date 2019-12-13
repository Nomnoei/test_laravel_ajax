<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use GuzzleHttp\Client;
//use guzzlehttp client laravel install
// composer require guzzlehttp/guzzle


class Test2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $provinces = DB::select('select * from province');
      //dd($provinces);
      $client = new \Guzzle\Service\Client('http://127.0.0.1:8080/api/');
      $response = $client->get("users/")->send();
      $data = $response->getBody();
      $data2 = json_decode($data);
      //dd($data2);
      //print_r($data2);
      return view("api.select",compact(['data2','provinces']));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("api.insert");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return "ตรงนี้";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function select(){
      //$client = new \GuzzleHttp\Client();
    $client = new \Guzzle\Service\Client('http://127.0.0.1:8080/api/');
    $response = $client->get("users/")->send();
    $data = $response->getBody();
    $data2 = json_decode($data);
    //dd($data2);
    //print_r($data2);
    return view("api.select",compact('data2'));
    }

    public function delete($id){
      $client = new \Guzzle\Service\Client('http://127.0.0.1:8080/api/');
      $response = $client->delete("users/$id")->send();
      $data = $response->getBody();
      $data2 = json_decode($data);
      return redirect('testapi2');
      //dd($data2);

    }
    public function insert(Request $request){
      //dd($request->all());


      $client = new \GuzzleHttp\Client();
     $response = $client->request('POST', 'http://127.0.0.1:8080/api/users/', [
                    'form_params' => ['name'=> $request->name,
                                        'city' => $request->city]
                ]);
                // echo $response->getStatusCode();
                // echo $response->getBody();


    $data = $response->getBody();
    $data2 = json_decode($data);
    return redirect('testapi2');
    }

    public function updateapi(Request $request){
      //dd($request->all());
      $client = new \GuzzleHttp\Client();
     $response = $client->request('PUT', 'http://127.0.0.1:8080/api/users/'.$request->id, [
                    'form_params' => ['name'=> $request->name,
                                        'city' => $request->city]
                ]);
                echo $response->getStatusCode();
                      echo $response->getBody();


    $data = $response->getBody();
    $data2 = json_decode($data);
    return redirect('testapi2');
    }
}
