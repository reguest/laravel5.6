<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Yazarlar extends Model
{
    protected $guarded = [];

<<<<<<< HEAD
    static function getName($id){
        $c=Yazarlar::where('id','=',$id)->count();
        if($c!=0){}
    }
=======
    static function getField($id,$field){
        $c= Yazarlar::where('id','=',$id)->count();

        if($c!=0){
            $w=Yazarlar::where('id','=',$id)->get();
            return $w[0][$field];
        }
        else
        {
return "Silinmiş yazar";
        }
    }

>>>>>>> a8787a87a15ef35241baa4361091a1a4f10549ca
}
