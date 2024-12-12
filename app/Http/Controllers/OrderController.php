<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Dish;
use Illuminate\Http\Request;

class OrderController extends Controller
{
     // Hiển thị danh sách đơn hàng
     public function index()
     {
        // $orders = Order::with('customer')->get();
         $orders = Order::with('customer') // Eager Loading để lấy thông tin khách hàng
                   ->whereNotNull('customer_id') // Chỉ lấy đơn hàng có khách hàng
                   ->paginate(10);
                //    ->get();
                 
         return view('orders.index', compact('orders'));
     }
 
     // Hiển thị form tạo đơn hàng mới
     public function create()
     {
        $dishes = Dish::all();
         $customers = Customer::all();
            // Lấy mã đơn hàng mới (có thể là tự động tạo mã đơn hàng hoặc lấy từ dữ liệu cũ)
         $orderCode = 'ORD' . (Order::max('id') + 1);
         //$orderCode = 'ORD-' . Carbon::now()->format('Ymd') . '-' . strtoupper(uniqid());
         return view('orders.create', compact('customers','dishes','orderCode'));
     }
 
    public function store(Request $request)
    {
        // Validate dữ liệu từ form
        $validated = $request->validate([
            'order_code' => 'required|unique:orders',
            'customer_id' => 'required',
            'total' => 'required|numeric|min:0',
            'status' => 'required|string|max:255',
        ]);
    
        // Lấy tất cả sản phẩm trong giỏ hàng của khách hàng
        $carts = Cart::where('customer_id', $request->customer_id)->get();
       // Chuẩn bị dữ liệu món ăn
       $dishes = $carts->map(function ($cart) {
        return [
            'dish_id' => $cart->dish_id,
            'name' => $cart->dish->name,  // Tên món ăn
            'quantity' => $cart->quantity,
            'total' => $cart->price * $cart->quantity,
        ];
    });
        // Tạo đơn hàng mới
        $order = new Order();
        $order->order_code = $request->order_code;
        $order->customer_id = $request->customer_id;
        $order->status = 'pending';
        $order->total = $dishes->sum('total');  // Tổng tiền đơn hàng
        $order->dishes = $dishes->toArray();  // Lưu thông tin món ăn vào cột 'dishes'
        $order->save();
    
        // Xóa các sản phẩm trong giỏ hàng (tuỳ chọn)
        Cart::where('customer_id', $request->customer_id)->delete();
    
        return redirect()->route('orders.index')->with('success', 'Đơn hàng đã được tạo thành công!');
    }
    
     // Hiển thị form chỉnh sửa đơn hàng
     public function edit($id)
     {
        $dishes = Dish::all();
         $order = Order::findOrFail($id);
         $customers = Customer::all();

    // Nếu món ăn đã được chọn trong đơn hàng, bạn có thể lấy ID của các món ăn đó như sau:
    $selectedDishIds = $order->dishes->pluck('id')->toArray();
         return view('orders.edit', compact('order','dishes', 'customers','selectedDishIds'));
     }
 
     // Cập nhật đơn hàng
     public function update(Request $request, $id)
     {
         $order = Order::findOrFail($id);
 
         $request->validate([
             'order_code' => 'required|unique:orders,order_code,' . $order->id,
             'customer_id' => 'required|exists:customers,id',
             'total' => 'required|numeric|min:0',
             'status' => 'required|string|max:255',
         ]);
 
         $order->update($request->all());
 
         return redirect()->route('orders.index')->with('success', 'Đơn hàng được cập nhật thành công.');
     }
 
     // Xóa đơn hàng
     public function destroy($id)
     {
         $order = Order::findOrFail($id);
         $order->delete();
 
         return redirect()->route('orders.index')->with('success', 'Đơn hàng đã được xóa.');
     }

     public function approve($id)
    {
        $order = Order::findOrFail($id);
        // Cập nhật trạng thái đơn hàng thành 'completed' (hoàn thành)
        $order->status = 'completed';
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Đơn hàng đã được duyệt!');
    }

}
