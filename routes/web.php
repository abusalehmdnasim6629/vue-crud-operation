<?php

use Illuminate\Support\Facades\Route;

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

Route::post('/store','MemberController@index');
Route::get('/getMember','MemberController@getMember');
Route::get('/searchMember/{name}','MemberController@searchMember');
Route::post('/deleteItem/{id}','MemberController@deleteItem');
Route::post('/editItem/{id}','MemberController@editItem');
