<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostType;
class PostTypeController extends Controller
{
    public function index() {
        $postTypes = PostType::all();
        return view('post_types.index', compact('postTypes'));
    }

    public function create() {
        return view('post_types.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        PostType::create($validated);
        return redirect()->route('post_types.index')->with('success', 'Loại bài viết đã được thêm.');
    }

    public function edit(PostType $postType) {
        return view('post_types.edit', compact('postType'));
    }

    public function update(Request $request, PostType $postType) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $postType->update($validated);
        return redirect()->route('post_types.index')->with('success', 'Loại bài viết đã được cập nhật.');
    }

    public function destroy(PostType $postType) {
        $postType->delete();
        return redirect()->route('post_types.index')->with('success', 'Loại bài viết đã được xóa.');
    }
}
