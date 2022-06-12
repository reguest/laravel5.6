<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kitap extends Model
{
    public $timestamps = false; //süreyi iptal eder
    protected $fillable = ['isim', 'yazarid'];
    protected $guarded = [];

    public function yazar()
    {
        return $this->hasOne('\App\Yazarlar', 'id', 'yazarid');
    }
}
