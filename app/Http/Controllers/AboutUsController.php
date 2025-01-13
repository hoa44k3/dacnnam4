<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutUs;
class AboutUsController extends Controller
{
    public function index()
    {
        $aboutUs = AboutUs::all();
        return view('about_us.index', compact('aboutUs'));
    }

    public function edit($id)
    {
        $aboutUs = AboutUs::findOrFail($id);
        return view('about_us.edit', compact('aboutUs'));
    }

    public function update(Request $request, $id)
    {
        $aboutUs = AboutUs::findOrFail($id);
    
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'mission' => 'nullable|string',
            'vision' => 'nullable|string',
        ]);
    
        // Xử lý hình ảnh nếu có upload mới
        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $imagePath = $image->store('about_us', 'public'); 
            $aboutUs->image_path = $imagePath; 
        }

        $aboutUs->title = $request->title;
        $aboutUs->content = $request->content;
        $aboutUs->mission = $request->mission;
        $aboutUs->vision = $request->vision;
    
        $aboutUs->save(); 
    
        return redirect()->route('about_us.index')->with('success', 'Cập nhật thông tin thành công.');
    }
    
}
