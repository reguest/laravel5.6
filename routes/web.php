<?php


use Illuminate\Support\Facades\DB;

Route::get('/kitaplar', function () {

    //  $kitap =  App\Kitap::firstOrCreate(['isim'=> 'denmeekle3']); // varsa getiriri yoksa ekler
    // dd($kitap);
    // foreach($x as $key => $value){
    //     echo $value['isim']."</br>";
    // } // veri çekme

    //  $kitap->isim = "orhannn";
    //  $kitap->save();

    //$kitap->delete();

    // $x =  \App\Kitap::find(1)->yazar->isim; 
    // echo$x;

    //hasMany id si 1 olan tüm ilişkili yazarları getirir
    
    



});

Route::get('/users', function () {
    db::table('users')->where('id', '=', 6)->delete();  // toplpu veri ekleme
    db::table('users')->truncate(); // tabloyu boşaltır
});
