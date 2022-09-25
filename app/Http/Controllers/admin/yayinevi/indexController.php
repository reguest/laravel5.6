<?php

namespace App\Http\Controllers\admin\yayinevi;

use App\Helper\mHelper;
use App\Http\Controllers\Controller;
use App\YayinEvi;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index()
    {
        //
        $data = YayinEvi::paginate(10);
        return view('admin.yayinevi.index', ['data' => $data]);
    }


    public function create()
    {
        return view('admin.yayinevi.create');
    }
    public function store(Request $request)
    {
        $all = $request->except('_token');
        // dd($all);
        $all['selflink'] = mHelper::permalink($all['name']);

        $insert = YayinEvi::create($all); //vtye gele ntüm istekleri eklemesi için
        if ($insert) {
            return redirect()->back()->with('status', 'yayın evi eklendi');
        } else {
            return redirect()->back()->with('status', 'yayın evi HATA');
        }
    }

    public function edit($id)
    {
        $data = YayinEvi::where('id', '=', $id)->get();
        return view('admin.yayinevi.edit', ['data' => $data]);
    }
    public function update(Request $request)
    {
        $id = $request->route('id');
        $c = YayinEvi::where('id', '=', $id)->count();
        if ($c != 0) {
            $all = $request->except('_token');
            $all['selflink'] = mHelper::permalink($all['name']);
            $update = YayinEvi::where('id', '=', $id)->update($all);
            if ($update) {
                return redirect()->back()->with('status', 'Yayın evi düzenlendi');
            } else {
                return redirect()->back()->with('status', 'Yayın evi DÜZENLENEMEDİ');
            }
        } else {
            return redirect('/');
        }
    }

    public function DELETE($id)
    {
      
        $c = YayinEvi::where('id', '=', $id)->count();
        if ($c != 0) {
            $delete = YayinEvi::where('id', "=",$id)->delete();
            return redirect()->back();
        } else {
            return redirect('/');
        }
    }
}
