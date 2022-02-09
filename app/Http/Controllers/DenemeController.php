<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DenemeController extends Controller
{
    public function index($name)
    {
        echo $name;
    }
    public function index2($name=null)
    {
        echo $name;
    }
    
}
