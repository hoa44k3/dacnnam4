<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Dish;
use App\Models\Payment;
class CartController extends Controller
{
     // Hiển thị danh sách giỏ hàng
     public function index()
     {
         $carts = Cart::with(['customer', 'dish'])->get();
         return view('carts.index', compact('carts'));
     }
 
     // Hiển thị form tạo giỏ hàng mới
     public function create()
     {
         $customers = Customer::all();
         $dishes = Dish::all();
         return view('carts.create', compact('customers', 'dishes'));
     }
 
     // Lưu giỏ hàng mới
     public function store(Request $request)
     {
         $request->validate([
             'customer_id' => 'required|exists:customers,id',
             'dish_id' => 'required|exists:dishes,id',
             'quantity' => 'required|integer|min:1',
         ]);
 
         $dish = Dish::findOrFail($request->dish_id);
 
         $cart = new Cart();
         $cart->customer_id = $request->customer_id;
         $cart->dish_id = $request->dish_id;
         $cart->quantity = $request->quantity;
         $cart->total = $dish->price * $request->quantity;
         $cart->save();
 
         return redirect()->route('carts.index')->with('success', 'Giỏ hàng được tạo thành công.');
     }
 
     // Hiển thị form chỉnh sửa giỏ hàng
     public function edit($id)
     {
         $cart = Cart::findOrFail($id);
         $customers = Customer::all();
         $dishes = Dish::all();
         return view('carts.edit', compact('cart', 'customers', 'dishes'));
     }
 
     // Cập nhật giỏ hàng
     public function update(Request $request, $id)
     {
         $request->validate([
             'customer_id' => 'required|exists:customers,id',
             'dish_id' => 'required|exists:dishes,id',
             'quantity' => 'required|integer|min:1',
         ]);
 
         $dish = Dish::findOrFail($request->dish_id);
 
         $cart = Cart::findOrFail($id);
         $cart->customer_id = $request->customer_id;
         $cart->dish_id = $request->dish_id;
         $cart->quantity = $request->quantity;
         $cart->total = $dish->price * $request->quantity;
         $cart->save();
 
         return redirect()->route('carts.index')->with('success', 'Giỏ hàng được cập nhật thành công.');
     }
 
     // Xóa giỏ hàng
     public function destroy($id)
     {
         $cart = Cart::findOrFail($id);
         $cart->delete();
 
         return redirect()->route('carts.index')->with('success', 'Giỏ hàng được xóa thành công.');
     }

     public function pay($id)
{
    $cart = Cart::findOrFail($id);
    
    // Xử lý thanh toán, ví dụ thay đổi trạng thái giỏ hàng hoặc chuyển sang bảng thanh toán
    // Giả sử bạn muốn chuyển dữ liệu giỏ hàng sang bảng thanh toán và xóa giỏ hàng
    $payment = Payment::create([
        'customer_id' => $cart->customer_id,
        'total_amount' => $cart->total,
        // Thêm các thông tin khác của thanh toán nếu cần
    ]);

    // Sau khi thanh toán thành công, xóa giỏ hàng
    $cart->delete();

    // Chuyển hướng đến trang danh sách thanh toán
    return redirect()->route('payments.index');
}

}
