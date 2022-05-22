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
// ,'middleware'=>['auth','role:editor']
Route::group(['namespace'=>"App\Http\Controllers\Project",'middleware'=>['auth']],function (){
    // request page
    Route::get('/requestcost', 'ProjectController@create')->name('projectRequest');// request page
    Route::get('/accept/{id}', 'ProjectController@approved')->name('approvedRequest');// approved page
    Route::post('/accept', 'ProjectController@postapproved')->name('postapprovedRequest');// approved page

    // current user projects
    // Route::get('/', 'ProjectController@index')->name('showALlProjects');
    // store page
    Route::resource('/projects', ProjectController::class,['names'=>'projects']);
    Route::get('/payment', 'ProjectController@payment')->name('payment');
});