<?php

namespace App\Http\Controllers\front\basket;

use App\Http\Controllers\Controller;
use App\Kitaplar;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Helper\sepetHelper;

class indexController extends Controller
{

    public function index()
    {
        //Session()->flush();
        return view('front.basket.index');
    }
    public function add($id)
    {
        $c = Kitaplar::where('id', '=', $id)->count();
        if ($c != 0) {
            $basket = [];
            $w = Kitaplar::where('id', '=', $id)->get();
            // dd($w);
            sepetHelper::add($id, $w[0]['fiyat'], asset($w[0]['image']), $w[0]['name']);
            // session(['basket' => $basket]);
            // dd(Session::get('basket'));
            return redirect()->back()->with('status', 'Sepete Eklediniz');
        } else {
        }
    }

    public function remove($id)
    {
        sepetHelper::remove($id);
        return redirect()->back();
    }

   



}
