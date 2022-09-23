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
use App\Kategoriler;

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
        $kategori=Kategoriler::all();
        return view('admin.kitap.create', ['yazar'=>$yazar,'yayinevi'=>$yayinevi,'kategori'=>$kategori]);
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
        } else {
            return redirect()->back()->with('status', 'kitap eklenemedi');
        }
    }

    public function edit($id)
    {
        $c=Kitaplar::where('id', '=', $id)->count();
        if ($c!=0) {
            $data=Kitaplar::where('id', '=', $id)->get();
            $yazar =Yazarlar::all();
            $yayinevi=YayinEvi::all();
            $kategori=Kategoriler::all();
            return view('admin.kitap.edit', ['kategori'=>$kategori,'data'=>$data,'yazar'=>$yazar,'yayinevi'=>$yayinevi]);
        } else {
            return redirect('/');
        }
    }

    public function update(Request $request)
    {
        $id=$request->route('id');
        $c=Kitaplar::where('id', '=', $id)->count();
        if ($c!=0) {
            $data=Kitaplar::where('id', '=', $id)->get();
            $all =$request->except('_token');
            $all['selflink']=mHelper::permalink($all['name']);
            $all['image']=imageUpload::singleUploadUpdate(rand(1, 9000), "kitap", $request->file('image'), $data, "image");
            $update = Kitaplar::where('id', '=', $id)->update($all);
            if ($update) {
                return redirect()->back()->with('status', 'kitap başarı ile güncellendi');
            } else {
                return redirect()->back()->with('status', 'kitap GÜNCELLENEMEDİ');
            }
        } else {
            return redirect('/');
        }
    }

    public function delete($id)
    {
        $c=Kitaplar::where('id', '=', $id)->count();
        if ($c!=0) {
            $data=Kitaplar::where('id', '=', $id)->get();
            File::delete('public/'.$data[0]['image']);
            Kitaplar::where('id', '=', $id)->delete();
            return redirect()->back();
        } else {
            return redirect('/');
        }
    }
}
