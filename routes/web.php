<?php

use App\Http\Controllers\admin\kullanici\indexController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/ajax', function(){
return view('ajax');
});
