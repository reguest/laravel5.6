<?php

namespace App\Http\Controllers\admin\kitap;

use App\Kitaplar;
use App\Yazarlar;
use App\YayinEvi;
use App\Helper\mHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helper\imageUpload;
use File;


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
    
    public function store(Request $request)
    {
        $all = $request->except('_token');
        //  dd($all);
        $all['selflink'] = mHelper::permalink($all['name']);
        $all['image'] = imageUpload::singleUpload(rand(1, 9000), "kitap", $request->file('image'));

        $insert = Kitaplar::create($all);
        if ($insert) {
            return redirect()->back()->with('status', 'kitap eklendi');
        }else {
            return redirect()->back()->with('status', 'kitap eklenemedi');
        }
    }




}
