<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

route::group(['prefix'=>'user','namespace'=>'Api\Auth','middleware'=>'checkLang'],function (){
    route::post('login','AuthController@login');
    route::post('register','AuthController@register');
});
route::group(['prefix'=>'user','namespace'=>'Api\Auth','middleware'=>['checkLang','AssignGuard:user-api']],function (){
    route::post('logout','AuthController@logout');
    route::post('search','AuthController@search');
});
