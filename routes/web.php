<?php

use App\Http\Controllers\admin\kullanici\indexController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware(['YasKontrol']);

Route::group(['namespace' => 'admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::get('/', 'indexController@index')->name('index');
    
    Route::group(['namespace'=>'yayinevi','prefix'=>'yayinevi','as'=>'yayinevi.']
    ,function(){
      Route::get('/','indexController@index')->name('index');
    });

});
