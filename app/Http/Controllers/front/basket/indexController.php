<?php

namespace App\Http\Controllers\front\basket;

use App\Http\Controllers\Controller;
use App\Kitaplar;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function add($id)
    {
        $c = Kitaplar::where('id', '=', $id)->count();
        if ($c != 0) {
            $basket = [];
            $w = Kitaplar::where('id', '=', $id)->get();
            //dd($w);
            $basket[$w[0]['id']] = ['id' => $w[0]['id'], 'price' => $w[0]['fiyat']];
            session(['basket' => $basket]);
            //dd(Session::get('basket'));
            return redirect()->back()->with('status','Sepete Eklediniz');
        } else {
        }
    }
}
