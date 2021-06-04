<?php

namespace App\Http\Controllers;

use App\Klass\Car;
use http\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class AppController extends Controller
{
    public function index()
    {

        $selects = ["1" => 1, "2" => 2, "3" => 3, "4" => 4, "5" => 5, "6" => 6];

        return view('home', compact('selects'));
    }

    public function getSession(Request $request)
    {
        if (!$request->session()->has('sess')) {
            return "NO SESSION";
        }
        return $request->session()->get('sess');

    }

    public function putSession(Request $request){
        $request->session()->put('sess', "THIS IS SESS SESSSION");
    }
}
