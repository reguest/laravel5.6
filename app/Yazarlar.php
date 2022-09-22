<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Yazarlar extends Model
{
    protected $guarded = [];

    static function getName($id){
        $c=Yazarlar::where('id','=',$id)->count();
        if($c!=0){}
    }
}
