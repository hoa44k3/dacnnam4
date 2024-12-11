<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\Dish;
use App\Models\Customer;
class FavoriteController extends Controller
{
    public function index()
    {
        $favorites = Favorite::with(['dish', 'customer'])->get();
        return view('favorites.index', compact('favorites'));
    }

    public function create()
    {
        $dishes = Dish::all();
        $customers = Customer::all();
        return view('favorites.create', compact('dishes', 'customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'dish_id' => 'required|exists:dishes,id',
        ]);

        Favorite::create([
            'customer_id' => $request->customer_id,
            'dish_id' => $request->dish_id,
        ]);

        return redirect()->route('favorites.index')->with('success', 'Favorite added successfully!');
    }

    public function edit($id)
    {
        $favorite = Favorite::findOrFail($id);
        $dishes = Dish::all();
        $customers = Customer::all();
        return view('favorites.edit', compact('favorite', 'dishes', 'customers'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'dish_id' => 'required|exists:dishes,id',
        ]);

        $favorite = Favorite::findOrFail($id);
        $favorite->update([
            'customer_id' => $request->customer_id,
            'dish_id' => $request->dish_id,
        ]);

        return redirect()->route('favorites.index')->with('success', 'Favorite updated successfully!');
    }

    public function destroy($id)
    {
        $favorite = Favorite::findOrFail($id);
        $favorite->delete();
        return response()->json(['success' => 'Favorite deleted successfully']);
    }
}
