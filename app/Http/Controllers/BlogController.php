<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Tag;
use App\Models\Category;
class BlogController extends Controller
{
    public function index()
{
    $blogs = Blog::with('tags', 'category')->get(); // Sử dụng `with()` để tải danh mục cùng các thẻ
    return view('blogs.index', compact('blogs'));
}



    public function create()
    {
        $categories = Category::all(); // Lấy tất cả các danh mục
        return view('blogs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
            'position' => 'nullable|string',
            'status' => 'required|in:pending,approved',
            'category_id' => 'required|exists:categories,id', // Kiểm tra xem category_id có tồn tại trong bảng categories hay không
        ]);

        $blog = new Blog();
        $blog->fill($validated);
        if ($request->hasFile('image')) {
            $blog->image = $request->file('image')->store('blogs', 'public');
        }
         // Lưu danh mục
        $blog->category_id = $request->category_id;
        if ($request->has('tag_ids')) {
            $blog->tags()->sync($request->tag_ids); // Đồng bộ tag
        }
        $blog->save();
        

        return redirect()->route('blogs.index')->with('success', 'Blog created successfully!');
    }

    // Show the form for editing the specified blog
    public function edit(Blog $blog)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('blogs.edit', compact('blog','tags','categories'));
    }

    // Update the specified blog in storage
    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
            'position' => 'nullable|string',
            'status' => 'required|in:pending,approved',
            'category_id' => 'required|exists:categories,id',
        ]);

        $blog->fill($validated);
        if ($request->hasFile('image')) {
            $blog->image = $request->file('image')->store('blogs', 'public');
        }

    // Cập nhật category_id
        $blog->category_id = $request->category_id;
        if ($request->has('tag_ids')) {
            $blog->tags()->sync($request->tag_ids); // Đồng bộ các thẻ tag
        }

        $blog->save();

        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully!');
    }

    // Remove the specified blog from storage
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return response()->json(['success' => 'Blog deleted successfully!']);
    }
    public function show(Blog $blog)
    {
        $blog->increment('view_count');
        return view('blogs.show', compact('blog'));
    }

}
