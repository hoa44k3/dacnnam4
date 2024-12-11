<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Dish;
use App\Models\Customer;
class CommentController extends Controller
{
    public function index()
    {
         $comments = Comment::all();
        //$comments = Comment::with('dish', 'customer')->get();
        return view('comments.index', compact('comments'));
    }

    public function create()
    {
        $dishes = Dish::all();
        $customers = Customer::all();
        return view('comments.create',compact('dishes','customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'dish_id' => 'nullable|exists:dishes,id',
            'customer_id' => 'nullable|exists:customers,id',
        ]);

        Comment::create($request->all());

        return redirect()->route('comments.index')->with('success', 'Comment added successfully.');
    }

    public function edit($id)
    {
        $comment = Comment::findOrFail($id);
        $dishes = Dish::all(); // Lấy tất cả món ăn
        $customers = Customer::all();
        return view('comments.edit', compact('comment','dishes', 'customers'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'content' => 'required',
            'dish_id' => 'nullable|exists:dishes,id',
            'customer_id' => 'nullable|exists:customers,id',
        ]);

        $comment = Comment::findOrFail($id);
        $comment->update($request->all());

        return redirect()->route('comments.index')->with('success', 'Comment updated successfully.');
    }

    public function destroy($id)
    {
        Comment::destroy($id);
        return response()->json(['success' => 'Comment deleted successfully.']);
    }
}
