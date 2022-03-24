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

Route::get('/', 'FrontController@index')->name('home');
Route::get('/login','AuthController@login')->name('login');
Route::post('/login/store','AuthController@LoginSubmit')->name('login.store');
Route::get('/register','AuthController@register')->name('register');
Route::post('/register/store','AuthController@registerSubmit')->name('register.store');
Route::group(['prefix'=>'/admin','middleware'=>['auth']],function(){
    Route::get('/logout','AuthController@logout')->name('logout');

    Route::view('/template','dashboard.template');
    Route::view('','dashboard.index')->name('admin');
    Route::view('/modal','dashboard.modal');

    Route::get('banner/delete/{id}', 'BannerController@destroy')->name('banner.delete');
    Route::get('banner/data', 'BannerController@Data')->name('banner.data');
    Route::resource('banner','BannerController');

    Route::get('benefit/delete/{id}', 'BenefitController@destroy')->name('benefit.delete');
    Route::get('benefit/data', 'BenefitController@Data')->name('benefit.data');
    Route::resource('benefit','BenefitController');
    
    Route::get('client/delete/{id}', 'ClientController@destroy')->name('client.delete');
    Route::get('client/data', 'ClientController@Data')->name('client.data');
    Route::resource('client','ClientController');

    Route::get('feature/delete/{id}', 'FeatureController@destroy')->name('feature.delete');
    Route::get('feature/data', 'FeatureController@Data')->name('feature.data');
    Route::resource('feature','FeatureController');

    Route::get('testimoni/delete/{id}', 'TestimoniController@destroy')->name('testimoni.delete');
    Route::get('testimoni/data', 'TestimoniController@Data')->name('testimoni.data');
    Route::resource('testimoni','TestimoniController');
});
