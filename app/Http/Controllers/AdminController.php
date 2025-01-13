<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Blog;
use App\Models\Dish;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }
    
    public function search(Request $request)
    {
        $query = $request->input('query');

        $blog = Blog::where('name', 'LIKE', $query)->first();
        if ($blog) {
            return redirect()->route('blogs.show', ['blog' => $blog->id]);
        }

        $dish = Dish::where('name', 'LIKE', $query)->first();
        if ($dish) {
            return redirect()->route('dish.show', ['dish' => $dish->id]);
        }

        return back()->with('error', 'No results found for: ' . $query);
    }

    
}
