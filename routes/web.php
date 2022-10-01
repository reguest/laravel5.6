
<?php

use App\Http\Controllers\admin\kullanici\indexController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;


Route::get('/ajax', function(){
    return view('ajax');
    });
    
Route::get('/', 'front\indexController@index')->name('index');
Route::get('/kategori/{selflink}', 'front\cat\indexController@index')->name('cat');
Route::get('/search', 'front\search\indexController@index')->name('search');
Route::get('/kitap/detay/{selflink}', 'front\kitap\indexController@index')->name('kitap.detay');
Route::get('/home', 'indexController@home')->name('home');
Route::get('/basket/flush', 'front\basket\indexController@flush')->name('basket.flush');
Route::get('/basket/add/{id}', 'front\basket\indexController@add')->name('basket.add');
Route::get('/basket', 'front\basket\indexController@index')->name('basket.index');
Route::get('/basket/remove/{id}', 'front\basket\indexController@remove')->name('basket.remove');
Route::get('/basket/complete', 'front\basket\indexController@complete')->name('basket.complete')->middleware(['auth']);
Route::post('/basket/complete', 'front\basket\indexController@completeStore')->name('basket.completeStore')->middleware(['auth']);
Auth::routes();

//admin kodları
Route::group(['namespace' => 'admin', 'prefix' => 'admin', 'as' => 'admin.','middleware'=>['auth','AdminCtrl']], function () {
    Route::get('/', 'indexController@index')->name('index');

    Route::group(
        ['namespace' => 'yayinevi', 'prefix' => 'yayinevi', 'as' => 'yayinevi.'],
        function () {
            Route::get('/', 'indexController@index')->name('index');
            Route::get('/ekle', 'indexController@create')->name('ekle');
            Route::post('/ekle', 'indexController@store')->name('create.post');
            Route::get('/duzenle/{id}', 'indexController@edit')->name('edit');
            Route::post('/duzenle/{id}', 'indexController@update')->name('edit.post');
            Route::get('/sil{id}', 'indexController@delete')->name('delete');
        }
    );


    Route::group(
        ['namespace' => 'yazar', 'prefix' => 'yazar', 'as' => 'yazar.'],
        function () {
            Route::get('/', 'indexController@index')->name('index');
            Route::get('/ekle', 'indexController@create')->name('ekle');
            Route::post('/ekle', 'indexController@store')->name('create.post');
            Route::get('/duzenle/{id}', 'indexController@edit')->name('edit');
            Route::post('/duzenle/{id}', 'indexController@update')->name('edit.post');
            Route::get('/sil{id}', 'indexController@delete')->name('delete');
        }
    );

    Route::group(
        ['namespace' => 'kategori', 'prefix' => 'kategori', 'as' => 'kategori.'],
        function () {
            Route::get('/', 'indexController@index')->name('index');
            Route::get('/ekle', 'indexController@create')->name('ekle');
            Route::post('/ekle', 'indexController@store')->name('create.post');
            Route::get('/duzenle/{id}', 'indexController@edit')->name('edit');
            Route::post('/duzenle/{id}', 'indexController@update')->name('edit.post');
            Route::get('/sil{id}', 'indexController@delete')->name('delete');
            Route::post('/getData', 'indexController@getData')->name('getData');
        
        }
    );

    Route::group(
        ['namespace' => 'kitap', 'prefix' => 'kitap', 'as' => 'kitap.'],
        function () {
            Route::get('/', 'indexController@index')->name('index');
            Route::get('/ekle', 'indexController@create')->name('ekle');
            Route::post('/ekle', 'indexController@store')->name('create.post');
            Route::get('/duzenle/{id}', 'indexController@edit')->name('edit');
            Route::post('/duzenle/{id}', 'indexController@update')->name('edit.post');
            Route::get('/sil{id}', 'indexController@delete')->name('delete');
        }
    );

    Route::group(
        ['namespace' => 'slider', 'prefix' => 'slider', 'as' => 'slider.'],
        function () {
            Route::get('/', 'indexController@index')->name('index');
            Route::get('/ekle', 'indexController@create')->name('ekle');
            Route::post('/ekle', 'indexController@store')->name('create.post');
            Route::get('/duzenle/{id}', 'indexController@edit')->name('edit');
            Route::post('/duzenle/{id}', 'indexController@update')->name('edit.post');
            Route::get('/sil{id}', 'indexController@delete')->name('delete');
        }
    );


    Route::group(
        ['namespace' => 'order', 'prefix' => 'order', 'as' => 'order.'],
        function () {
            Route::get('/', 'indexController@index')->name('index');
            Route::get('/ekle', 'indexController@create')->name('ekle');
            Route::post('/ekle', 'indexController@store')->name('create.post');
            Route::get('/detail/{id}', 'indexController@detail')->name('detail');
            Route::get('/sil{id}', 'indexController@delete')->name('delete');
        }
    );
});  //admin kodları
