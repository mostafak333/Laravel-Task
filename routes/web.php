<?php

use App\Http\Controllers\LocationController;
use App\Http\Controllers\GoldController;
use App\Http\Controllers\BarController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::Post('/addCountry', 'CountryController@create');
Route::resource('location', LocationController::class);
Route::resource('gold', GoldController::class);
Route::resource('bar', BarController::class);

Route::get('/greetin', function () {
    return view('aa');
});
