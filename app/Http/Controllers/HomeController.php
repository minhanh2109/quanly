<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    //Admin
    public function index(){
        return view('admin.index');
    }

    //Trang chủ
    public function home(){
        return view('home.index');
    }
}
