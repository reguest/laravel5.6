
<?php

use App\Http\Controllers\admin\kullanici\indexController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
