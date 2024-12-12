<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\Customer;
class PaymentController extends Controller
{
    public function index()
    {
        //$payments = Payment::with('customer')->where('is_paid', true)->get();
        $payments = Payment::all();
        return view('payments.index', compact('payments'));
    }

    // Hiển thị form thêm thanh toán
    public function create()
    {
        $customers = Customer::all(); // Lấy danh sách khách hàng
        return view('payments.create', compact('customers'));
    }

    // Lưu thanh toán mới
    public function store(Request $request)
    {
        $request->validate([
            'payment_code' => 'required|unique:payments,payment_code',
            'customer_id'  => 'nullable|exists:customers,id',
            'total'        => 'required|numeric',
            'method'       => 'required|string',
        ]);

        Payment::create($request->all());

        return redirect()->route('payments.index')->with('success', 'Thanh toán đã được thêm!');
    }

    // Hiển thị form chỉnh sửa thanh toán
    public function edit($id)
    {
        $payment = Payment::findOrFail($id);
        $customers = Customer::all(); // Lấy danh sách khách hàng
        return view('payments.edit', compact('payment', 'customers'));
    }

    // Cập nhật thanh toán
    public function update(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);

        $request->validate([
            'payment_code' => 'required|unique:payments,payment_code,' . $payment->id,
            'customer_id'  => 'nullable|exists:customers,id',
            'total'        => 'required|numeric',
            'method'       => 'required|string',
        ]);

        $payment->update($request->all());

        return redirect()->route('payments.index')->with('success', 'Thanh toán đã được cập nhật!');
    }

    // Xóa thanh toán
    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();

        return redirect()->route('payments.index')->with('success', 'Thanh toán đã được xóa!');
    }
}
