<?php

namespace App\Http\Controllers\front\basket;

use App\Http\Controllers\Controller;
use App\Kitaplar;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Helper\sepetHelper;
use Illuminate\Support\Facades\Auth;
use App\Order;

class indexController extends Controller
{
    public function index()
    {
        

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

    public function complete()
    {
       // Session::forget('basket');
        if (sepetHelper::countData()!=0) {
            return view('front.basket.complete');
        } else {
            return redirect('/');
        }
    }

    public function completeStore(Request $request)
    {
        $request->validate(['adres'=>'required','telefon'=>'required']);
        $adres= $request->input('adres');
        $telefon= $request->input('telefon');
        $mesaj= $request->input('mesaj');
        $json=json_encode(sepetHelper::allList());

        $array = [
         'userId' =>Auth::id(),
         'adres' =>$adres,
         'telefon' =>$telefon,
         'mesaj' =>$mesaj,
         'json' =>$json

        ];

        $insert= Order::create($array);
        if ($insert) {
            return redirect()->back()->with('status', 'siparişiniz alındı');
        } else {
            return redirect()->back()->with('status', 'siparişiniz !!!ALINAMADI!!!');
        }
    }
}
