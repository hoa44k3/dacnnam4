<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Tag;
use App\Models\Category;
use App\Models\PostType; 

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::with('tags', 'category', 'postType')->get(); 
        return view('blogs.index', compact('blogs'));
    }



    public function create()
    {
        $categories = Category::all();
        $postTypes = PostType::all();
      
        return view('blogs.create', compact('categories', 'postTypes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
            'position' => 'nullable|string',
            'status' => 'required|in:pending,approved',
            'category_id' => 'required|exists:categories,id', 
            'post_type_id' => 'required|exists:post_types,id',
            'video' => 'nullable|url',
            
        ]);

        $blog = new Blog();
        $blog->fill($validated);
        if ($request->hasFile('image')) {
            $blog->image = $request->file('image')->store('blogs', 'public');
        }
       
       // Lưu video nếu có (chỉ lưu URL)
    // if ($request->has('video') && $request->video) {
    //     $blog->video = $request->video;
    // }
    if ($request->has('video') && $request->video) {
        // Chuyển đổi URL YouTube thành URL nhúng
        $video_url = str_replace('https://www.youtube.com/watch?v=', 'https://www.youtube.com/embed/', $request->video);
        $blog->video = $video_url;
    }
    
    

         // Lưu danh mục
        $blog->category_id = $request->category_id;
        if ($request->has('tag_ids')) {
            $blog->tags()->sync($request->tag_ids); 
        }
        $blog->save();
        

        return redirect()->route('blogs.index')->with('success', 'Blog created successfully!');
    }

    public function edit(Blog $blog)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $postTypes = PostType::all(); 
        return view('blogs.edit', compact('blog','tags','categories','postTypes'));
    }

    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
            'position' => 'nullable|string',
            'status' => 'required|in:pending,approved',
            'category_id' => 'required|exists:categories,id',
           'video' => 'nullable|url',
            'post_type_id' => 'required|exists:post_types,id',
        ]);

        $blog->fill($validated);
        
        if ($request->hasFile('image')) {
            $blog->image = $request->file('image')->store('blogs', 'public');
        }
        if ($request->has('video') && $request->video) {
            // Chuyển đổi URL YouTube thành URL nhúng
            $video_url = str_replace('https://www.youtube.com/watch?v=', 'https://www.youtube.com/embed/', $request->video);
            $blog->video = $video_url;
        }

        $blog->category_id = $request->category_id;
        if ($request->has('tag_ids')) {
            $blog->tags()->sync($request->tag_ids);
        }

        $blog->save();

        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully!');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
       
        return redirect()->route('blogs.index')->with('success', 'bài viết đã được xóa.');
       
    }
    public function show(Blog $blog)
    {
        $blog->increment('view_count');
        return view('blogs.show', compact('blog'));
    }

}
