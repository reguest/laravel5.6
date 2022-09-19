<?php

use App\Http\Controllers\admin\kullanici\indexController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware(['YasKontrol']);

Route::group(['namespace' => 'admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {  //admin kodları
    Route::get('/', 'indexController@index')->name('index');

    Route::group(['namespace'=>'yayinevi','prefix'=>'yayinevi','as'=>'yayinevi.'], function () {
        Route::get('/', 'indexController@index')->name('index');
        Route::get('/ekle', 'indexController@create')->name('ekle');
        Route::post('/ekle', 'indexController@store')->name('create.post');
        Route::get('/duzenle/{id}', 'indexController@edit')->name('edit');
        Route::post('/duzenle/{id}', 'indexController@update')->name('edit.post');
        Route::get('/sil{id}', 'indexController@delete')->name('delete');
    }
  );

    Route::group(['namespace' => 'yazar', 'prefix' => 'yazar', 'as' => 'yazar.'],function () {
            Route::get('/', 'indexController@index')->name('index');
            Route::get('/ekle', 'indexController@create')->name('ekle');
            Route::post('/ekle', 'indexController@store')->name('create.post');
            Route::get('/duzenle/{id}', 'indexController@edit')->name('edit');
            Route::post('/duzenle/{id}', 'indexController@update')->name('edit.post');
            Route::get('/sil{id}', 'indexController@delete')->name('delete');
        }
    );

    Route::group(['namespace' => 'kitap', 'prefix' => 'kitap', 'as' => 'kitap.'],function () {
      Route::get('/', 'indexController@index')->name('index');
      Route::get('/ekle', 'indexController@create')->name('ekle');
      Route::post('/ekle', 'indexController@store')->name('create.post');
      Route::get('/duzenle/{id}', 'indexController@edit')->name('edit');
      Route::post('/duzenle/{id}', 'indexController@update')->name('edit.post');
      Route::get('/sil{id}', 'indexController@delete')->name('delete');
  }
);

Route::group(['namespace' => 'kategori', 'prefix' => 'kategori', 'as' => 'kategori.'],function () {
  Route::get('/', 'indexController@index')->name('index');
  Route::get('/ekle', 'indexController@create')->name('ekle');
  Route::post('/ekle', 'indexController@store')->name('create.post');
  Route::get('/duzenle/{id}', 'indexController@edit')->name('edit');
  Route::post('/duzenle/{id}', 'indexController@update')->name('edit.post');
  Route::get('/sil{id}', 'indexController@delete')->name('delete');
}
);





});  //admin kodları
