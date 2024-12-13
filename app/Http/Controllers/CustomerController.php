<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Storage;
class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
            'gender' => 'nullable|in:male,female,other',
            'password' => 'required|string|min:6',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Thêm kiểm tra cho avatar
        ]);
    
        $data = $request->all(); // Lấy tất cả dữ liệu
    
        // Xử lý ảnh avatar
        if ($request->hasFile('avatar')) {
            $data['avatar'] = $request->file('avatar')->store('avatars', 'public'); // Lưu avatar vào thư mục public/storage/avatars
        }
    
        // Tạo khách hàng mới
        Customer::create($data);
       
        return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
    }
    
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email,' . $customer->id,
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
            'gender' => 'nullable|in:male,female,other',
            'password' => 'nullable|string|min:6',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Thêm kiểm tra cho avatar
        ]);
        
        $data = $request->all(); // Lấy tất cả dữ liệu
    
        // Xử lý avatar nếu có
        if ($request->hasFile('avatar')) {
            // Xóa ảnh cũ nếu có
            if ($customer->avatar) {
                Storage::disk('public')->delete($customer->avatar);
            }
            // Lưu ảnh mới
            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }
        
        // Cập nhật thông tin khách hàng
        $customer->update($data);
    
        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }
    
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return response()->json(['success' => 'Customer deleted successfully.']);
    }
}
