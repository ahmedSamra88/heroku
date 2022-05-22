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

Route::get('/dashboard', function () {
    return view('layouts.admin');
})->name('dashboard');
// ,
Route::group(['namespace'=>"App\Http\Controllers\Dashboard",'prefix'=>'dashboard','middleware'=>['auth','role:admin']],function (){
    // home page
    Route::get('main', 'HomeController@index')->name('components');
    Route::post('main', 'HomeController@edit')->name("editmain");// home page
    Route::resource('ourwork', OurWorkController::class);

    Route::get('project-settings', 'ProjectController@settings');
    Route::post('project-settings', 'ProjectController@editsettings')->name("projectsettings");
    // serviceoption
    Route::post('project-service', 'ProjectController@serviceoption')->name("serviceoption");
    Route::post('project-eng', 'ProjectController@assignEng')->name("assignEng");

    Route::resource('project-manage', ProjectController::class);
    Route::get('showRequests','ProjectController@showRequests')->name("showRequests");
    Route::resource('bage', BagController::class);
    // user
    Route::resource('user-manage', UserController::class);

});