<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactReplyMail;
class ContactController extends Controller
{
    public function index(){
        $contacts = Contact::all();
        return view('contacts.index', compact('contacts'));
    }
    public function reply(Request $request)
    {
        // Kiểm tra thông tin phản hồi
        $request->validate([
            'contact_id' => 'required|exists:contacts,id',
            'response' => 'required|string',
        ]);

        // Lấy thông tin liên hệ từ ID
        $contact = Contact::find($request->contact_id);
        $contact->response = $request->response;
        $contact->response_date = now();
        $contact->save();

        Mail::to($contact->email)->send(new ContactReplyMail($request->response));

        // Trả về phản hồi
        return redirect()->back()->with('success', 'Phản hồi đã được gửi thành công!');
    }

    public function sendResponse(Request $request)
    {
        $request->validate([
            'contact_id' => 'required|exists:contacts,id',
            'response' => 'required|string',
        ]);

        $contact = Contact::findOrFail($request->contact_id);
        $contact->update([
            'response' => $request->response,
            'response_date' => now(),
        ]);
        Mail::to($contact->email)->send(new ContactReplyMail($request->response));

        return back()->with('success', 'Phản hồi đã được gửi và lưu thành công.');
    }
    public function editResponse(Request $request)
    {
        $request->validate([
            'contact_id' => 'required|exists:contacts,id',
            'response' => 'required|string',
        ]);

        $contact = Contact::findOrFail($request->contact_id);
        $contact->update([
            'response' => $request->response,
            'response_date' => now(),
        ]);

        return back()->with('success', 'Phản hồi đã được cập nhật thành công.');
    }
}