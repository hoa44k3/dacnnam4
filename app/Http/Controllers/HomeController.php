<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('site.home');
    }

    public function contact(){
        return view('site.contact');
    }
    public function about(){
        return view('site.about');
    }
    public function blog(){
        return view('site.blog');
    }
    public function blogdetail(){
        return view('site.blogdetail');
    }
}
