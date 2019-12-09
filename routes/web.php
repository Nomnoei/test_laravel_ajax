<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/2', function () {
    return view('ajaxinputtext');
});

Route::post('/save-book','HomeController@save_book');

Route::post('/save-book2','HomeController@save_book2');

Route::post('/save-book3','HomeController@save_book3');

Route::get('/test','TestController@index');

Route::get('/addform','Appform@index');

Route::get('/addform/add','Appform@add');

Route::get('/addform/delete','Appform@delete');

Route::get('/addform/alldelete','Appform@alldelete');

Route::post('/addform/data','Appform@data');

//Route::resource('/modal','ModalController');

Route::get('/modal','ModalController@index');

Route::post('/modal/add','ModalController@modal');

Route::get('/modal/deleteall','ModalController@DeleteSesstion');

Route::get('/modal/delete/{id}','ModalController@Deleterow');

Route::post('/modal/edit/{id}','ModalController@editrow');
