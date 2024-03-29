<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class YayinEvi extends Model
{
    protected $guarded = []; //vt ye  gelen tüm istekleri eklemesi için

    static function getField($id, $field)
    {
        $c = YayinEvi::where('id', '=', $id)->count();

        if ($c != 0) {
            $w = YayinEvi::where('id', '=', $id)->get();
            return $w[0][$field];
        } else {
            return "Silinmiş yayın evi";
        }
    }






}
