<?php

namespace App\Http\Controllers;
use App\Models\Dish;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class DishController extends Controller
{
    public function index()
    {
        $dishes = Dish::with('category')->get(); // Lấy danh sách món ăn kèm thông tin danh mục
        return view('dish.index', compact('dishes'));
    }

    // Hiển thị form thêm món ăn
    public function create()
    {
        $categories = Category::all(); // Lấy danh sách danh mục
        return view('dish.create', compact('categories'));
    }

    // Xử lý lưu món ăn mới
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'sale_price' => 'nullable|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $dish = new Dish();
        $dish->name = $validated['name'];
        $dish->price = $validated['price'];
        $dish->sale_price = $validated['sale_price'] ?? null;

        if ($request->hasFile('image')) {
            $dish->image = $request->file('image')->store('dishes', 'public'); // Lưu file vào thư mục storage/app/public/dishes
        }

        $dish->category_id = $validated['category_id'];
        $dish->save();

        return redirect()->route('dish.index')->with('success', 'Món ăn đã được thêm thành công!');
    }

    // Hiển thị form sửa món ăn
    public function edit($id)
    {
        $dish = Dish::findOrFail($id); // Tìm món ăn theo ID
        $categories = Category::all(); // Lấy danh sách danh mục
        return view('dish.edit', compact('dish', 'categories'));
    }

    // Xử lý cập nhật món ăn
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'sale_price' => 'nullable|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $dish = Dish::findOrFail($id);
        $dish->name = $validated['name'];
        $dish->price = $validated['price'];
        $dish->sale_price = $validated['sale_price'] ?? null;

        if ($request->hasFile('image')) {
            // Xóa hình ảnh cũ
            if ($dish->image) {
                Storage::disk('public')->delete($dish->image);
            }
            // Lưu hình ảnh mới
            $dish->image = $request->file('image')->store('dishes', 'public');
        }

        $dish->category_id = $validated['category_id'];
        $dish->save();

        return redirect()->route('dish.index')->with('success', 'Món ăn đã được cập nhật thành công!');
    }

    // Xóa món ăn
    public function destroy($id)
    {
        $dish = Dish::findOrFail($id);

        // Xóa hình ảnh nếu có
        if ($dish->image) {
            Storage::disk('public')->delete($dish->image);
        }

        $dish->delete();

        return response()->json(['success' => 'Món ăn đã được xóa thành công!']);
    }
}
