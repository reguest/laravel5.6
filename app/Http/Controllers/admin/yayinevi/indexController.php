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
        $data=YayinEvi::paginate(10);
        return view('admin.yayinevi.index',['data'=>$data]);
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
}
