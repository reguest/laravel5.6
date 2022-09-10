<?php

namespace App\Http\Controllers\admin\kitap;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Kitaplar;
use App\Yazarlar;
use App\YayinEvi;

class indexController extends Controller
{
    public function index()
    {
        $data= Kitaplar::paginate(10);
        return view('admin.kitap.index', ['data'=>$data]);
    }
    public function create()
    {
     
        $yazar =Yazarlar::all();
        $yayinevi=YayinEvi::all();
        return view('admin.kitap.create', ['yazar'=>$yazar,'yayinevi'=>$yayinevi]);
    }
}
