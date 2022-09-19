<?php

namespace App\Http\Controllers\admin\kategori;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Kategoriler;
use App\Helper\mHelper;

class indexController extends Controller
{
    public function index()
    {
        //
        $data = Kategoriler::paginate(10);
        return view('admin.kategori.index', ['data' => $data]);
    }
    public function create()
    {
        return view('admin.kategori.create');
    }
    public function store(Request $request)
    {
        $all = $request->except('_token');
        // dd($all);
        $all['selflink'] = mHelper::permalink($all['name']);

        $insert = Kategoriler::create($all); //vtye gele ntüm istekleri eklemesi için
        if ($insert) {
            return redirect()->back()->with('status', 'Kategori  eklendi');
        } else {
            return redirect()->back()->with('status', 'Kategori  HATA');
        }
    }

    public function edit($id)
    {
        $data = Kategoriler::where('id', '=', $id)->get();
        return view('admin.kategori.edit', ['data' => $data]);
    }
    public function update(Request $request)
    {
        $id = $request->route('id');
        $c = Kategoriler::where('id', '=', $id)->count();
        if ($c != 0) {
            $all = $request->except('_token');
            $all['selflink'] = mHelper::permalink($all['name']);
            $update = Kategoriler::where('id', '=', $id)->update($all);
            if ($update) {
                return redirect()->back()->with('status', 'Kategori evi düzenlendi');
            } else {
                return redirect()->back()->with('status', 'Kategori evi DÜZENLENEMEDİ');
            }
        } else {
            return redirect('/');
        }
    }

    public function DELETE($id)
    {
      
        $c = Kategoriler::where('id', '=', $id)->count();
        if ($c != 0) {
            $delete = Kategoriler::where('id', "=",$id)->delete();
            return redirect()->back();
        } else {
            return redirect('/');
        }
    }
}
