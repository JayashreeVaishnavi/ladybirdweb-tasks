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

Route::get('fizz-buzz', 'HomeController@getFizzBuzz');
Route::get('palindrome', 'HomeController@palindrome');
Route::post('check-palindrome', 'HomeController@checkPalindrome');
Route::get('broken-egg','HomeController@brokenEggView');
Route::post('broken-eggs','HomeController@getBrokenEggAttemptsAndFloors');
