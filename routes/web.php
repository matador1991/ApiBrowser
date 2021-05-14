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

route::get('getLogin','GeneralController@log')->name('getLogin');
route::post('login','GeneralController@login')->name('login');
route::get('getRegister','GeneralController@reg')->name('getRegister');
route::post('Register','GeneralController@register')->name('Register');
route::post('search','GeneralController@search')->name('search');
route::get('dashboard','GeneralController@dashboard')->name('dashboard');
route::get('logout','GeneralController@logout')->name('logout');
