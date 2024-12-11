<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('blogs.index', compact('blogs'));
    }

    // Show the form for creating a new blog
    public function create()
    {
        return view('blogs.create');
    }

    // Store a newly created blog in storage
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
           
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
            'position' => 'nullable|string',
            'status' => 'required|in:pending,approved',
        ]);

        $blog = new Blog();
        $blog->fill($validated);
        if ($request->hasFile('image')) {
            $blog->image = $request->file('image')->store('blogs', 'public');
        }
        $blog->save();

        return redirect()->route('blogs.index')->with('success', 'Blog created successfully!');
    }

    // Show the form for editing the specified blog
    public function edit(Blog $blog)
    {
        return view('blogs.edit', compact('blog'));
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
        ]);

        $blog->fill($validated);
        if ($request->hasFile('image')) {
            $blog->image = $request->file('image')->store('blogs', 'public');
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
}
