<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Blog;
class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('tags.index', compact('tags'));
    }

    public function create()
    {
        $blogs = Blog::select('id', 'name')->get();
        return view('tags.create', compact('blogs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'blog_id' => 'required|exists:blogs,id',
        ]);

        Tag::create($request->all());
        return redirect()->route('tags.index')->with('success', 'Thêm thành công.');
    }

    public function show($id)
    {
        $tag = Tag::findOrFail($id);
        return view('tags.show', compact('tag'));
    }

    public function edit(Tag $tag)
    {
        $blogs = Blog::all(); 
        return view('tags.edit', compact('tag', 'blogs'));
    }


    public function update(Request $request, Tag $tag)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'blog_id' => 'required|exists:blogs,id',
        ]);
        $tag->update($validated);
        return redirect()->route('tags.index')->with('success', 'Tag updated successfully.');
    }
    public function destroy(Tag $tag)
    {
        $tag->delete();
       
        return redirect()->route('tags.index')->with('success', ' đã được xóa.');
       
    }
}
