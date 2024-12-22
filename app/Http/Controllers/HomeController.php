<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Tag;
use App\Models\Category;
use App\Models\Dish;
use App\Models\Comment;
class HomeController extends Controller
{
    public function index(Request $request)
    {
        $blogs = Blog::select('name', 'description', 'image')->take(2)->get(); // Lấy 2 bài viết đầu tiên
    
        if ($request->has('category')) {
            $category = Category::find($request->category);
            if ($category) {
               
                $blogs = $category->blogs()->paginate(10); 
            } else {
                $blogs = Blog::paginate(10); 
            }
        } else {
            $blogs = Blog::paginate(10); 
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

    // Lấy các bài viết với thẻ tag, và thêm số lượng bình luận vào mỗi bài viết
    $blogs = Blog::with(['tags', 'comments']) // Với 'comments' để lấy số lượng bình luận
                ->select('id', 'name', 'description', 'image', 'view_count', 'category_id')
                ->paginate(3); 

    return view('site.blog', compact('blogs', 'categories')); // Truyền biến $blogs và $categories vào view
}

public function blogdetail()
{
    // Lấy bài viết đầu tiên (hoặc có thể thay bằng phương thức khác như lấy bài viết mới nhất)
    $blog = Blog::with('comments', 'tags')->first(); // Lấy bài viết đầu tiên và các bình luận, thẻ tag của nó

    // Tăng lượt xem
    $blog->increment('view_count');

    // Lấy các bài viết liên quan cùng danh mục
    $relatedBlogs = Blog::where('category_id', $blog->category_id)->take(2)->get();

    // Lấy tất cả danh mục
    $categories = Category::all();

    // Trả về view chi tiết bài viết, thêm biến categories vào
    return view('site.blogdetail', compact('blog', 'relatedBlogs', 'categories'));
}

    public function menu(){
        $categories = Category::with('dishes')->get(); 
        return view('site.menu', compact('categories'));
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
    public function dishDetail($id)
    {
        $dish = Dish::with('category')->findOrFail($id);
        return view('site.dish_detail', compact('dish'));
    }
    
}
