<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Dish;
use App\Models\User;
class CommentController extends Controller
{
    public function index()
    {
         $comments = Comment::all();
        return view('comments.index', compact('comments'));
    }

    public function create()
    {
        $dishes = Dish::all();
        $users = User::all();
        return view('comments.create',compact('dishes','users'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
            'dish_id' => 'required|exists:dishes,id',
        ]);

        Comment::create([
            'content' => $request->content,
            'dish_id' => $request->dish_id,
            'user_id' => auth()->id(),  
        ]);

        return back()->with('success', 'Bình luận đã được đăng.');
    }


    public function edit($id)
    {
        $comment = Comment::findOrFail($id);
        $dishes = Dish::all(); 
        $users = User::all();
        return view('comments.edit', compact('comment','dishes', 'users'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'content' => 'required',
            'dish_id' => 'nullable|exists:dishes,id',
            'user_id' => 'nullable|exists:users,id',
        ]);

        $comment = Comment::findOrFail($id);
        $comment->update($request->all());

        return redirect()->route('comments.index')->with('success', 'Cập nhật thành công.');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
       
        return redirect()->route('comments.index')->with('success', ' đã được xóa.');
       
    }
}
