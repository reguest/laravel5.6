<?php

use App\Http\Controllers\admin\kullanici\indexController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

Auth::routes();

Route::get('/form', function () {
  echo '<form action="/post" method="POST" enctype="multipart/form-data">' . csrf_field();

  /*echo '
  <input type="file" name="photo">
  <button>Gönder </button>
  </form>'; tek görsel */

  //çoklu görsel yükleme
  echo '
  <input type="file" multiple name="photos[]">
  <button>Gönder </button>
  </form>';
});

// Route::post('/post', function (Request $request) {
//   $file = $request->file('photo');
//   $filename = "benimresmim." . $file->getClientOriginalExtension();
//   $path = $file->storeAs('photos', $filename);
//   dd($path);
// }); // tek görsel yükleme beraberinde storage'e kaydediyor


// Route::post('/post', function (Request $request) {
//   $images = $request->file('photos');
//   $path = [];
//   foreach ($images as $image) {
//     $file=$image->store('photos');
//     $name = "123-" . rand(1, 90) . '.' . $image->getClientOriginalExtension();
//     $file = $image->storeAs('photos', $name);
//    $file = $image->storeAs('photos', $name ,'s3'); // belirttiğimiz amozon hesabına görseli yükler
//     $path[] = $file;
//   }
//   dd($path);
// }); // çoklu görsel yükleme beraberinde storage'e kaydediyor


Route::post('/post', function (Request $request) {
  $control = Storage::disk('local')->exists('photos/2BpYy4oeXhe6rV59EtjYzdULxrIqHJnaIUgr9BFe.jpg');
  dd($control);
}); // aynı dosya ismi varmı yokmu kontrol eder










Route::get('/home', 'HomeController@index')->name('home')->middleware(['YasKontrol']);

Route::group(['namespace' => 'admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {  //admin kodları

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
});  //admin kodları
