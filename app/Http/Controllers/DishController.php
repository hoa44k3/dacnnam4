<?php

namespace App\Http\Controllers;
use App\Models\Dish;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Region; 
use Illuminate\Support\Facades\Storage;
class DishController extends Controller
{
    public function index()
    {
        
        $dishes = Dish::with('category', 'region')->get();
        return view('dish.index', compact('dishes'));
    }

    public function create()
    {
        $categories = Category::all(); 
        $regions = Region::all();
        return view('dish.create', compact('categories','regions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'nullable|exists:categories,id',
            'origin' => 'required|string',
            'ingredients' => 'required|string',
            'preparation' => 'required|string',
            'cultural_value' => 'required|string',
            'region_id' => 'nullable|exists:regions,id',
        ]);

        $dish = new Dish();
        $dish->name = $validated['name'];
        $dish->region_id = $validated['region_id'];  
       
        $dish->description = $validated['description'];
        $dish->origin = $validated['origin'];
        $dish->ingredients = $validated['ingredients'];
        $dish->preparation = $validated['preparation'];
        $dish->cultural_value = $validated['cultural_value'];
       
       
        if ($request->hasFile('image')) {
            $dish->image = $request->file('image')->store('dishes', 'public'); 
        }

        $dish->category_id = $validated['category_id'];
        $dish->save();
       
        return redirect()->route('dish.index')->with('success', 'Món ăn đã được thêm thành công!');
    }

    public function edit(Dish $dish)
    {
        $categories = Category::all();
        $regions = Region::all();
        return view('dish.edit', compact('dish', 'categories', 'regions'));
    }
  
    public function update(Request $request, Dish $dish)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'category_id' => 'nullable|exists:categories,id',
        'origin' => 'required|string',
        'ingredients' => 'required|string',
        'preparation' => 'required|string',
        'cultural_value' => 'required|string',
        'region_id' => 'nullable|exists:regions,id',
    ]);
    $dish->name = $validated['name']; 
    $dish->description = $validated['description'];
    $dish->origin = $validated['origin'];
    $dish->ingredients = $validated['ingredients'];
    $dish->preparation = $validated['preparation'];
    $dish->cultural_value = $validated['cultural_value'];
    $dish->category_id = $validated['category_id'];
    $dish->region_id = $validated['region_id'];
  
    if ($request->hasFile('image')) {
        if ($dish->image) {
            Storage::disk('public')->delete($dish->image);
        }
        $dish->image = $request->file('image')->store('dishes', 'public');
    }

    $dish->save();
    
    return redirect()->route('dish.index')->with('success', 'Món ăn đã được cập nhật thành công!');
}

    public function destroy($id)
    {
        $dish = Dish::findOrFail($id);
        if ($dish->image) {
            Storage::disk('public')->delete($dish->image);
        }
        $dish->delete();

        return response()->json(['success' => 'Món ăn đã được xóa thành công!']);
    }

    // public function show($id)
    // {
       
    //     $dish = Dish::with(['category', 'region'])->findOrFail($id); 
    //     return view('dish.show', compact('dish'));
    // }
    public function show(Dish $dish)
    {
        $dish->increment('view_count');
        return view('dish.show', compact('dish'));
    }
}
