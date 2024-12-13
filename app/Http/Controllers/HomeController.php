<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
class HomeController extends Controller
{
    public function index()
    {
        $blogs = Blog::select('name', 'description', 'image')->take(2)->get(); // Lấy 2 bài viết đầu tiên
        return view('site.home', compact('blogs')); // Truyền biến $blogs vào view
    }
    

    public function contact(){
        return view('site.contact');
    }
    public function about()
    {
        $blogs = Blog::select('name', 'description', 'image')->take(2)->get(); // Lấy 2 bài viết
        $blogTop = $blogs->first(); // Bài viết đầu tiên (phần trên)
        $blogBottom = $blogs->skip(1)->first(); // Bài viết thứ hai (phần dưới)
        return view('site.about', compact('blogTop', 'blogBottom')); // Truyền biến vào view
    }
    
    public function blog()
    {
        $blogs = Blog::select('name', 'description', 'image')->get(); // Lấy tất cả bài viết
        return view('site.blog', compact('blogs')); // Truyền biến $blogs vào view
    }
    
    public function blogdetail(){
        return view('site.blogdetail');
    }
    public function menu(){
        return view('site.menu');
    }
   
}
