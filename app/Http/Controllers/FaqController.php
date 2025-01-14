<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;
class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::all();
        return view('faqs.index', compact('faqs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
        ]);
        Faq::create([
            'question' => $request->input('question'),
        ]);

        return redirect()->back()->with('success', 'Câu hỏi đã được gửi thành công.');
    }
    public function answer(Request $request, $id)
    {
        $request->validate([
            'answer' => 'required|string|max:5000',
        ]);
        $faq = Faq::findOrFail($id);
        $faq->update([
            'answer' => $request->input('answer'),
        ]);

        return redirect()->back()->with('success', 'Câu trả lời đã được lưu.');
    }
    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('faqs.index')->with('success', ' đã được xóa.');
    }
}
