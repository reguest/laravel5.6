<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DenemeController extends Controller
{
    // public function index($name, $surname)
    // {
    //     echo $name . " " . $surname;
    // }
    // public function test($postId, $commentId)
    // {
    //     echo $postId . "" . $commentId;
    // }

    public function index()
    {
      return view('home');
    }





}
