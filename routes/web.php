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

use App\Models\dashboard\Component;
use App\Models\Rating;
use App\Http\Controllers\RateController;

Auth::routes();
Route::get('/', function () {
    
    return view('welcome')->withHead(Component::where("name","head")->first())->withRate(Rating::all());
})->name('welcome');
Route::get('/about',function(){
    return view('pages.single')->withHead(Component::where("name","head")->first());
})->name("head");
// Route::get('/register', function () {
//     return view('auth.register');
// })->name('register')->middleware('guest');
Route::get('/login', function () {
    return view('auth.login');
})->name('login')->middleware('guest');

Route::get('/verify', function () {
    return view('auth.verify');
})->name('getverify')->middleware('guest');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::post('/create', 'App\Http\Controllers\AuthController@create')->name('register')->middleware('guest');
Route::post('/verify', 'App\Http\Controllers\AuthController@verify')->name('verify')->middleware('guest');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// rating
Route::resource('rate', RateController::class);