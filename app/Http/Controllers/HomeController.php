<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Tag;
use App\Models\Category;
class HomeController extends Controller
{
    public function index(Request $request)
    {
        $blogs = Blog::select('name', 'description', 'image')->take(2)->get(); // Lấy 2 bài viết đầu tiên
    
        if ($request->has('category')) {
            $category = Category::find($request->category);
            if ($category) {
                // Lọc bài viết theo danh mục
                $blogs = $category->blogs()->paginate(10); // Sử dụng phương thức blogs() đã định nghĩa ở trên
            } else {
                $blogs = Blog::paginate(10); // Nếu không tìm thấy danh mục, lấy tất cả bài viết
            }
        } else {
            $blogs = Blog::paginate(10); // Nếu không có tham số category, lấy tất cả bài viết
        }
    
        return view('site.home', compact('blogs'));
    }
    
    

    public function contact(){
        return view('site.contact');
    }
    public function about()
    {
        $blogs = Blog::select('name', 'description', 'image')->take(2)->get(); // Lấy 2 bài viết
        $blogTop = $blogs->first(); // Bài viết đầu tiên (phần trên)
        $blogBottom = $blogs->skip(1)->first(); // Bài viết thứ hai (phần dưới)
        return view('site.about', compact('blogTop', 'blogBottom')); // Truyền biến vào view
    }
    
    public function blog()
    {
        // Lấy tất cả các danh mục và số lượng bài viết trong mỗi danh mục
        $categories = Category::withCount('blogs')->get();
    
        // Lấy các bài viết với thẻ tag
        $blogs = Blog::with('tags')->select('name', 'description', 'image')->paginate(3); 
    
        return view('site.blog', compact('blogs', 'categories')); // Truyền biến $blogs và $categories vào view
    }
    
    
    public function blogdetail(Request $request)
    {
        // Kiểm tra nếu có id được gửi qua AJAX
        if ($request->has('id')) {
            $blog = Blog::find($request->id); // Lấy bài viết theo ID
    
            // Lấy các bài viết liên quan cùng category
            $relatedBlogs = Blog::where('category_id', $blog->category_id)->take(2)->get();
    
            // Trả về dữ liệu dạng JSON nếu sử dụng AJAX
            return response()->json([
                'blog' => view('site.blogdetail', compact('blog', 'relatedBlogs'))->render()
            ]);
        }
    
        // Nếu không có id, trả về bài viết mặc định
        $blog = Blog::first();
        $relatedBlogs = Blog::where('category_id', $blog->category_id)->take(2)->get();
    
        // Lấy tất cả danh mục
        $categories = Category::all(); // Lấy tất cả danh mục
    
        return view('site.blogdetail', compact('blog', 'relatedBlogs', 'categories'));
    }
    


    public function menu(){
        return view('site.menu');
    }
    public function showByTag(Tag $tag)
    {
        // Lấy bài viết liên kết với thẻ
        $blog = $tag->blog;

        if (!$blog) {
            return redirect()->route('blog')->with('error', 'Không có bài viết nào được liên kết với thẻ này.');
        }

        return view('site.blog', compact('blog', 'tag'));
    }

}
